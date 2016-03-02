<?php

namespace PhowerBootstrap3Module\Form\View\Helper;

use Zend\Form\View\Helper;
use Zend\Form\ElementInterface;

class FormMultiCheckbox extends Helper\FormMultiCheckbox
{

    public function render(ElementInterface $element)
    {
        if (!$this->separator) {
            $this->separator = $this->closeTag() . $this->openTag($element);
            return $this->openTag($element) . parent::render($element) . $this->closeTag();
        }
        
        return parent::render($element);
    }

    public function openTag(ElementInterface $element)
    {
        $inline = $element->getOption('inline') ? sprintf(' %s-inline', $this->getInputType()) : '';
        return sprintf('<div class="checkbox%s">', $inline);
    }

    public function closeTag()
    {
        return '</div>';
    }

}
