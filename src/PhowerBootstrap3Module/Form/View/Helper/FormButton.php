<?php

namespace PhowerBootstrap3Module\Form\View\Helper;

use Zend\Form\View\Helper;
use Zend\Form\ElementInterface;

class FormButton extends Helper\FormButton
{

    use \PhowerBootstrap3Module\Form\View\Helper\AttributeClassTrait;

    public function __invoke(ElementInterface $element = null, $buttonContent = null)
    {
        if ($element && !$element->hasAttribute('class')) {
            $this->addClasses($element, ['btn', 'btn-default']);
        }

        return parent::__invoke($element);
    }

}
