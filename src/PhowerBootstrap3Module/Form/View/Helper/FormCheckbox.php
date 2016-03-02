<?php

namespace PhowerBootstrap3Module\Form\View\Helper;

use Zend\Form\View\Helper;
use Zend\Form\ElementInterface;

class FormCheckbox extends Helper\FormCheckbox
{

    use \PhowerBootstrap3Module\Form\View\Helper\AttributeClassTrait;

    public function render(ElementInterface $element)
    {
        return $this->openTag($element) . parent::render($element) . $this->closeTag();
    }

    public function openTag(ElementInterface $element)
    {
        $disabled = $element->hasAttribute('disabled') ? ' disabled' : '';
        $inline = $element->hasAttribute('inline') ? ' checkbox-inline' : '';
        return sprintf('<div class="checkbox%s%s"><label>', $disabled, $inline);
    }

    public function closeTag()
    {
        return '</label></div>';
    }

}
