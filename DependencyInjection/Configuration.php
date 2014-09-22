<?php

namespace DCS\Form\GeoFormFieldBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dcs_form_geo_form_field');

        $rootNode
            ->children()
                ->arrayNode('configs')
                    ->defaultValue(array())
                    ->useAttributeAsKey('name')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('callback')->defaultNull()->end()
                            ->scalarNode('callbackWhenEmpty')->defaultNull()->end()
                            ->scalarNode('loadGoogle')->defaultTrue()->end()
                            ->scalarNode('apiKey')->defaultNull()->end()
                            ->scalarNode('preventEnter')->defaultTrue()->end()
                            ->scalarNode('language')->defaultValue('en')->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('default')
                    ->isRequired()
                    ->children()
                        ->scalarNode('callback')->defaultNull()->end()
                        ->scalarNode('callbackWhenEmpty')->defaultNull()->end()
                        ->scalarNode('loadGoogle')->defaultTrue()->end()
                        ->scalarNode('apiKey')->defaultNull()->end()
                        ->scalarNode('preventEnter')->defaultTrue()->end()
                        ->scalarNode('language')->defaultValue('en')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
