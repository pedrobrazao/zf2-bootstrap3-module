<?php

namespace PhowerBootstrap3Module\Form\View\Helper;

use Zend\Form\View\Helper;
use Zend\Form\ElementInterface;
use Zend\Form\LabelAwareInterface;

class FormRow extends Helper\FormRow
{

    use \PhowerBootstrap3Module\Form\View\Helper\AttributeClassTrait;

    /**
     * The class that is added to element that have errors
     *
     * @var string
     */
    protected $inputErrorClass = 'has-error';

    public function render(ElementInterface $element, $labelPosition = null)
    {
        $label = $element->getLabel();
        if (isset($label) && '' !== $label) {
            if (null !== ($translator = $this->getTranslator())) {
                $label = $translator->translate($label, $this->getTranslatorTextDomain());
            }
        }

        if (is_null($labelPosition)) {
            $labelPosition = $this->labelPosition;
        }

//        $inputErrorClass = $this->getInputErrorClass();
//        if (count($element->getMessages()) > 0 && !empty($inputErrorClass)) {
//            $element = $this->addClass($element, $inputErrorClass);
//        }

        if ($this->partial) {
            $vars = [
                'element' => $element,
                'label' => $label,
                'labelAttributes' => $this->labelAttributes,
                'labelPosition' => $labelPosition,
                'renderErrors' => $this->renderErrors,
            ];

            return $this->view->render($this->partial, $vars);
        }

        $labelHelper = $this->getLabelHelper();
        $elementHelper = $this->getElementHelper();
        $elementErrorsHelper = $this->getElementErrorsHelper();

        if ($element->getOption('form-horizontal')) {
            $labelCols = (int) $element->getOption('label-cols') ? : 3;
            $inputCols = (int) $element->getOption('input-cols') ? : 12 - $labelCols;
        }

        if (isset($label) && '' !== $label && $element->getAttribute('type') !== 'hidden') {
            $attributes = ['class' => 'control-label'];
            if (isset($labelCols)) {
                $attributes['class'] .= sprintf(' col-sm-%d', $labelCols);
            }
            if ($element->hasAttribute('id')) {
                $attributes['for'] = $element->getAttribute('id');
            }
            $labelString = $labelHelper->openTag($attributes) . $label . $labelHelper->closeTag();
        } else {
            $labelString = '';
        }

        $elementString = $elementHelper->render($element);

        if ($this->renderErrors) {
            $errorsString = $elementErrorsHelper->render($element);
        } else {
            $errorsString = '';
        }

        $arguments = ['class' => 'form-group'];
        if (count($element->getMessages()) > 0) {
            $arguments['class'] .= ' ' . $this->inputErrorClass;
        }
        $html = $this->openTag($arguments);

        if ($labelPosition === self::LABEL_PREPEND) {
            $html .= $labelString;
        }

        if (isset($inputCols)) {
            $attributes = ['class' => sprintf('col-sm-%d', $inputCols)];
            if ($labelString === '') {
                $attributes['class'] .= sprintf(' col-sm-offset-%d', $labelCols);
            }
            $html .= sprintf('<div %s>', $this->createAttributesString($attributes));
        }

        $prependMarkup = $element->getOption('prepend-markup') ? : '';
        $appendMarkup = $element->getOption('append-markup') ? : '';

        $html .= $prependMarkup;
        $html .= $elementString;
        $html .= $appendMarkup;

        $html .= $errorsString;

        if (isset($inputCols)) {
            $html .= '</div>';
        }

        if ($labelPosition === self::LABEL_APPEND) {
            $html .= $labelString;
        }

        $html .= '</div>';

        return $html;
    }

    public function openTag(array $arguments = [])
    {
        if (count($arguments) === 0) {
            return '<div>';
        }

        return sprintf('<div %s>', $this->createAttributesString($arguments));
    }

    public function closeTag()
    {
        return '</div>';
    }

}
