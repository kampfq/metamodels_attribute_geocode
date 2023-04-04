<?php

namespace KampfQ\AttributeGeocodeBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages the bundle configuration
 */
class MetaModelsAttributeGeocodeExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        $managedSchemaTypeNames   = $container->getParameter('metamodels.managed-schema-type-names') ?? [];
        $managedSchemaTypeNames[] = 'leaflet_geocode';
        $container->setParameter('metamodels.managed-schema-type-names', $managedSchemaTypeNames);
    }
}
