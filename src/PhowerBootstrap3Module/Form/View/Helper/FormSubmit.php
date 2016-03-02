<?php

namespace PhowerBootstrap3Module\Form\View\Helper;

use Zend\Form\View\Helper;
use Zend\Form\ElementInterface;

class FormSubmit extends Helper\FormSubmit
{

    use \PhowerBootstrap3Module\Form\View\Helper\AttributeClassTrait;

    public function __invoke(ElementInterface $element = null)
    {
        if ($element && !$element->hasAttribute('class')) {
            $this->addClasses($element, ['btn', 'btn-default']);
        }

        return parent::__invoke($element);
    }

}
