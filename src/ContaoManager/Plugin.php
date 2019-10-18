<?php


namespace KampfQ\AttributeGeocodeBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use KampfQ\AttributeGeocodeBundle\MetaModelsAttributeGeocodeBundle;
use MetaModels\CoreBundle\MetaModelsCoreBundle;

/**
 * Plugin for the Contao Manager.
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(MetaModelsAttributeGeocodeBundle::class)
                ->setLoadAfter(
                    [
						MetaModelsCoreBundle::class,
                    ]
                )
                ->setReplace(['metamodelsattribute_geocode'])
        ];
    }
}
