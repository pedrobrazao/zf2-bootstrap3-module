<?php

namespace PhowerBootstrap3Module\Form\View\Helper;

use Zend\Form\ElementInterface;

trait AttributeClassTrait
{

    /**
     * Add class
     *
     * @param ElementInterface $element
     * @param string $class
     * @return ElementInterface
     */
    public function addClass(ElementInterface $element, $class)
    {
        $classes = explode(' ', $element->getAttribute('class'));
        $class = trim($class);

        if (!in_array($class, $classes)) {
            $classes[] = $class;
            $element->setAttribute('class', trim(implode(' ', $classes)));
        }

        return $element;
    }

    /**
     * Add classes
     *
     * @param ElementInterface $element
     * @param array $classes
     * @return ElementInterface
     */
    public function addClasses(ElementInterface $element, array $classes)
    {
        foreach ($classes as $class) {
            $element = $this->addClass($element, $class);
        }
        return $element;
    }

    /**
     * Remove class
     *
     * @param ElementInterface $element
     * @param string $class
     * @return ElementInterface
     */
    public function removeClass(ElementInterface $element, $class)
    {
        $classes = explode(' ', $element->getAttribute('class'));
        $class = trim($class);

        if (in_array($class, $classes)) {
            foreach ($classes as $key => $name) {
                if ($name === $class) {
                    unset($classes[$key]);
                }
            }
            $element->setAttribute('class', implode(' ', $classes));
        }

        return $element;
    }

    /**
     * Remove classes
     *
     * @param ElementInterface $element
     * @param array $classes
     * @return ElementInterface
     */
    public function removeClasses(ElementInterface $element, array $classes)
    {
        foreach ($classes as $class) {
            $element = $this->removeClass($element, $class);
        }
        return $element;
    }

    /**
     * Has class
     *
     * @param ElementInterface $element
     * @param string $class
     * @return boolean
     */
    public function hasClass(ElementInterface $element, $class)
    {
        $class = trim($class);
        $classes = explode(' ', $element->getAttribute('class'));
        return in_array($class, $classes);
    }

}
