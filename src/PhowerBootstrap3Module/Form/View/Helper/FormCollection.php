<?php

namespace PhowerBootstrap3Module\Form\View\Helper;

use Zend\Form\View\Helper;
use Zend\Form\ElementInterface;

class FormCollection extends Helper\FormCollection
{

    use \PhowerBootstrap3Module\Form\View\Helper\AttributeClassTrait;

    public function __invoke(ElementInterface $collection = null, $wrap = true)
    {
        if ($collection) {
            if ($collection->getOption('form-inline') || $this->hasClass($collection, 'form-inline')) {
                foreach ($collection as $element) {
                    $element->setOption('form-inline', true);
                }
            } elseif ($collection->getOption('form-horizontal') || $this->hasClass($collection, 'form-hotizontal')) {
                $labelCols = (int) $collection->getOption('label-cols') ? : 3;
                $inputCols = (int) $collection->getOption('input-cols') ? : 12 - $labelCols;
                foreach ($collection as $element) {
                    $options = array_merge($element->getOptions(), [
                        'form-horizontal' => true,
                        'label-cols' => $labelCols,
                        'input-cols' => $inputCols,
                    ]);
                    $element->setOptions($options);
                }
            }
        }

        if (null !== $shouldWrap = $collection->getOption('should_wrap')) {
            $wrap = $shouldWrap;
        }

        return parent::__invoke($collection, $wrap);
    }

}
