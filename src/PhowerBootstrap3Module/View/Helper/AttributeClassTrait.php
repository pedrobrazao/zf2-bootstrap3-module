<?php

namespace PhowerBootstrap3Module\View\Helper;

use Zend\Form\ElementInterface;

trait AttributeClassTrait
{

    /**
     * Get classes as array
     * 
     * @param string|array|null $classes
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getClassesAsArray($classes = null)
    {
        if ($classes === null) {
            $classes = [];
        } elseif (is_string($classes)) {
            $classes = explode(' ', $classes);
        } elseif (is_string($classes)) {
            $classes = explode(' ', $classes);
        } elseif (!is_array($classes)) {
            throw new \InvalidArgumentException('Argument "attribute" must be a string or an array.');
        }

        if (isset($classes['class']) && is_string($classes['class'])) {
            $classes = explode(' ', $classes['class']);
        }

        foreach ($classes as $key => $value) {
            if ($value === '') {
                unset($classes[$key]);
            }
        }

        return $classes;
    }

    /**
     * Add class
     * 
     * @param string $class
     * @param string|array $attribute
     * @return string
     */
    public function addClass($class, $attribute = null)
    {
        $classes = $this->getClassesAsArray($attribute);
        $class = trim($class);

        if (!in_array($class, $classes)) {
            $classes[] = $class;
        }

        return implode(' ', $classes);
    }

    /**
     * Add classes
     * 
     * @param array $classes
     * @param string|array $attribute
     * @return string
     */
    public function addClasses(array $classes, $attribute = null)
    {
        foreach ($classes as $class) {
            $attribute = $this->addClass($class, $attribute);
        }

        return $attribute;
    }

    /**
     * Remove class
     * 
     * @param string $class
     * @param string|array|null $attribute
     * @return string
     */
    public function removeClass($class, $attribute)
    {
        $classes = $this->getClassesAsArray($attribute);
        $class = trim($class);

        foreach ($classes as $key => $value) {
            if ($value === $class) {
                unset($classes[$key]);
            }
        }

        return implode(' ', $classes);
    }

    /**
     * Remove classes
     *
     * @param array $classes
     * @param string|array $attribute
     * @return string
     */
    public function removeClasses(array $classes, $attribute)
    {
        foreach ($classes as $class) {
            $attribute = $this->removeClass($class, $attribute);
        }

        return $attribute;
    }

    /**
     * Has class
     *
     * @param ElementInterface $element
     * @param string $class
     * @return boolean
     */
    public function hasClass($class, $attribute = null)
    {
        $classes = $this->getClassesAsArray($attribute);
        $class = trim($class);

        return in_array($class, $classes);
    }

}
