<?php


namespace KampfQ\AttributeGeocodeBundle\Attribute;

use Doctrine\DBAL\Connection;
use MetaModels\Attribute\AbstractSimpleAttributeTypeFactory;
use MetaModels\Helper\TableManipulator;

/**
 * Attribute type factory for geocode attributes.
 */
class AttributeTypeFactory extends AbstractSimpleAttributeTypeFactory
{
    /**
     * {@inheritDoc}
     *
     * @param Connection       $connection       The database connection.
     * @param TableManipulator $tableManipulator The table manipulator.
     */
    public function __construct(Connection $connection, TableManipulator $tableManipulator)
    {
        parent::__construct($connection, $tableManipulator);

        $this->typeName  = 'geocode';
        $this->typeIcon  = 'bundles/metamodelsattributegeocode/geocode.png';
        $this->typeClass = Geocode::class;
    }
}
