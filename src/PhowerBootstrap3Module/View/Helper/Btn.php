<?php

namespace PhowerBootstrap3Module\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Btn extends AbstractHelper
{

    use AttributeClassTrait;

    /**
     * @var array
     */
    protected $classes = ['btn'];

    /**
     * Magic invoke method
     * 
     * @param string $href
     * @param string $text
     * @param array $attributes
     * @param boolean $escapeText
     * @return string
     */
    public function __invoke($href, $text, array $attributes = [], $escapeText = true)
    {
        $attributes['href'] = $href;
        $attributes['class'] = $this->addClasses($this->classes, $attributes);

        if ($escapeText) {
            $text = $this->getView()->escapeHtml($text);
        }

        return $this->openTag($attributes) . $text . $this->closeTage();
    }

    /**
     * Open tag
     * 
     * @param array $attributes
     * @return string
     */
    public function openTag(array $attributes = [])
    {
        $markup = '<a';
        $view = $this->getView();

        foreach ($attributes as $key => $value) {
            $markup .= sprintf(' %s="%s"', $key, $view->escapeHtmlAttr($value));
        }

        $markup .= '>';

        return $markup;
    }

    /**
     * Close tag
     * 
     * @return string
     */
    public function closeTage()
    {
        return '</a>';
    }

}
