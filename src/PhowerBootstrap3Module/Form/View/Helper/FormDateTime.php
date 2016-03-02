<?php

namespace PhowerBootstrap3Module\Form\View\Helper;

use Zend\Form\View\Helper;
use Zend\Form\ElementInterface;

class FormDateTime extends Helper\FormDateTime
{

    use \PhowerBootstrap3Module\Form\View\Helper\AttributeClassTrait;

    public function __invoke(ElementInterface $element = null)
    {
        if ($element && !$element->hasAttribute('class')) {
            $this->addClass($element, 'form-control');
        }

        return parent::__invoke($element);
    }

    public function render(ElementInterface $element)
    {
        if ($element->getOption('static')) {
            return $this->getView()->formElementStatic($element);
        }
        
        return parent::render($element);
    }

}
