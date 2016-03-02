<?php

namespace PhowerBootstrap3Module\Form\View\Helper;

use Zend\Form\View\Helper;
use Zend\Form\View\Helper\AbstractHelper;
use Zend\Form\ElementInterface;
use Zend\Form\Element\Hidden;

class FormElementStatic extends AbstractHelper
{

    protected $elementHelper;

    public function __invoke(ElementInterface $element = null)
    {
        if (!$element) {
            return $this;
        }

        return $this->render($element);
    }

    public function render(ElementInterface $element)
    {
        $hidden = $this->getHiddenElement($element);

        return $this->openTag() . $this->getView()->formHidden($hidden) . $this->getValueLabel($element) . $this->closeTag();
    }

    public function openTag()
    {
        $arguments = [
            'class' => 'form-control-static',
        ];
        return sprintf('<p %s>', $this->createAttributesString($arguments));
    }

    public function closeTag()
    {
        return '</p>';
    }

    public function getValueLabel(ElementInterface $element)
    {
        $value = $element->getValue();

        if ($options = $element->getOption('value_options')) {
            if (isset($options[$value])) {
                return $options[$value];
            }
        }

        if (method_exists($element, 'getValueOptions')) {
            foreach ($element->getValueOptions() as $option) {
                if (isset($option['value']) && $option['value'] == $value) {
                    return $option['label'];
                }
            }
        }

        return $value;
    }

    public function getHiddenElement(ElementInterface $element)
    {
        if ($element instanceof Hidden) {
            return $element;
        }

        $name = $element->getName();
        $value = $element->getValue();

        $hidden = new Hidden($name);
        $hidden->setValue($value);

        return $hidden;
    }

}
