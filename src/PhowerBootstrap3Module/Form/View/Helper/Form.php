<?php

namespace PhowerBootstrap3Module\Form\View\Helper;

use Zend\Form\View\Helper;
use Zend\Form\FormInterface;

class Form extends Helper\Form
{

    use \PhowerBootstrap3Module\Form\View\Helper\AttributeClassTrait;

    public function __invoke(FormInterface $form = null)
    {
        if ($form) {
            if ($form->getOption('form-inline') || $this->hasClass($form, 'form-inline')) {
                $form = $this->addClass($form, 'form-inline');
                foreach ($form as $element) {
                    $element->setOption('form-inline', true);
                }
            } elseif ($form->getOption('form-horizontal') || $this->hasClass($form, 'form-hotizontal')) {
                $form = $this->addClass($form, 'form-horizontal');
                $labelCols = (int) $form->getOption('label-cols') ? : 3;
                $inputCols = (int) $form->getOption('input-cols') ? : 12 - $labelCols;
                foreach ($form as $element) {
                    $options = array_merge($element->getOptions(), [
                        'form-horizontal' => true,
                        'label-cols' => $labelCols,
                        'input-cols' => $inputCols,
                    ]);
                    $element->setOptions($options);
                }
            }
        }

        $markup = parent::__invoke($form);
        //dump($markup);
        return $markup;
    }

}
