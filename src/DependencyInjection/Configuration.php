<?php

namespace Macavity\VueToTwigBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /** {@inheritdoc} */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('vuetotwig', 'array');
        $rootNode
            ->children()
            ->scalarNode('asset_directory')->defaultValue('%kernel.project_dir%/assets/')->end()
            ->scalarNode('build_directory')->defaultValue('%kernel.project_dir%/templates/build/')->end()
            ->end();
        return $treeBuilder;
    }
}