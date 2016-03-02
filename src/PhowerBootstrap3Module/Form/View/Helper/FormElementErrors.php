<?php

namespace PhowerBootstrap3Module\Form\View\Helper;

use Zend\Form\View\Helper;

class FormElementErrors extends Helper\FormElementErrors
{

    /**     * @+
     * @var string Templates for the open/close/separators for message tags
     */
    protected $messageOpenFormat = '<ul%s><li>';
    protected $messageCloseString = '</li></ul>';
    protected $messageSeparatorString = '</li><li>';
    protected $attributes = ['class' => 'list-unstyled text-danger'];

}
