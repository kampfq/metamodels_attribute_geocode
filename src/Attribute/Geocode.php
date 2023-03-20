<?php

namespace KampfQ\AttributeGeocodeBundle\Attribute;

use MetaModels\Attribute\BaseSimple;

/**
 * This is the MetaModelAttribute class for handling geocode fields.
 */
class Geocode extends BaseSimple
{
    /**
     * {@inheritdoc}
     */
    public function getSQLDataType()
    {
        // @codingStandardsIgnoreStart
        @trigger_error(
            'Class "' . __CLASS__ . '" is a managed attribute you should not call "' . __METHOD__ . '".',
            E_USER_DEPRECATED
        );
        // @codingStandardsIgnoreEnd

        return 'varchar(255) NOT NULL default \'\'';
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributeSettingNames()
    {
        return array_merge(parent::getAttributeSettingNames(), array(
            'isunique',
            'searchable',
            'filterable',
            'mandatory',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldDefinition($arrOverrides = array())
    {
        $arrFieldDef              = parent::getFieldDefinition($arrOverrides);
        $arrFieldDef['inputType'] = 'leaflet_geocode';

        return $arrFieldDef;
    }
}
