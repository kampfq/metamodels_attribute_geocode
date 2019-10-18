<?php


use KampfQ\AttributeGeocodeBundle\Attribute\AttributeTypeFactory;
use KampfQ\AttributeGeocodeBundle\Attribute\Geocode;

// This hack is to load the "old locations" of the classes.
spl_autoload_register(
    function ($class) {
        static $classes = [
            'KampfQ\Attribute\Geocode\Geocode' => Geocode::class,
            'KampfQ\Attribute\Geocode\AttributeTypeFactory' => AttributeTypeFactory::class
        ];

        if (isset($classes[$class])) {
            // @codingStandardsIgnoreStart Silencing errors is discouraged
            @trigger_error('Class "' . $class . '" has been renamed to "' . $classes[$class] . '"', E_USER_DEPRECATED);
            // @codingStandardsIgnoreEnd

            if (!class_exists($classes[$class])) {
                spl_autoload_call($class);
            }

            class_alias($classes[$class], $class);
        }
    }
);
