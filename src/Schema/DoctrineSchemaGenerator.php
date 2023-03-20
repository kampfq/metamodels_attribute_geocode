<?php

/**
 * This file is part of kampfq/metamodels_attribute_geocode.
 *
 * (c) 2012-2023 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    kampfq/metamodels_attribute_geocode
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @copyright  2012-2023 The MetaModels team.
 * @license    https://github.com/kampfq/metamodels_attribute_geocode/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

declare(strict_types = 1);

namespace KampfQ\AttributeGeocodeBundle\Schema;

use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\Types;
use MetaModels\Information\AttributeInformation;
use MetaModels\Schema\Doctrine\AbstractAttributeTypeSchemaGenerator;

/**
 * This adds all alias columns to doctrine tables schemas.
 */
class DoctrineSchemaGenerator extends AbstractAttributeTypeSchemaGenerator
{
    /**
     * {@inheritDoc}
     */
    protected function getTypeName(): string
    {
        return 'geocode';
    }

    /**
     * {@inheritDoc}
     */
    protected function generateAttribute(Table $tableSchema, AttributeInformation $attribute): void
    {
        $this->setColumnData($tableSchema, $attribute->getName(), Types::STRING, [
            'length'  => 255,
            'default' => '',
            'notnull' => true,
        ]);
    }
}
