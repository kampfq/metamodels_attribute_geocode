<?php

/**
 * This file is part of KampfQ/attribute_geocode.
 *
 * (c) 2012-2019 The KampfQ team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    KampfQ/attribute_geocode
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2012-2019 The KampfQ team.
 * @license    https://github.com/KampfQ/attribute_geocode/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

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
