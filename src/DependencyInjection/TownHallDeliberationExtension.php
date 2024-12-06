<?php

namespace Pixel\TownHallDeliberationBundle\DependencyInjection;

use Sulu\Bundle\PersistenceBundle\DependencyInjection\PersistenceExtensionTrait;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;

class TownHallDeliberationExtension extends Extension implements PrependExtensionInterface
{
    use PersistenceExtensionTrait;

    public function prepend(ContainerBuilder $container)
    {
        if ($container->hasExtension('sulu_admin')) {
            $container->prependExtensionConfig(
                'sulu_admin',
                [
                    'forms' => [
                        'directories' => [
                            __DIR__ . "/../Resources/config/forms",
                        ],
                    ],
                    'lists' => [
                        'directories' => [
                            __DIR__ . "/../Resources/config/lists",
                        ],
                    ],
                    'resources' => [
                        'deliberations' => [
                            'routes' => [
                                'detail' => 'townhall.get_deliberation',
                                'list' => 'townhall.get_deliberations',
                            ],
                        ],
                    ],
                ]
            );
        }
    }

    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . "/../Resources/config"));
        $loader->load("services.xml");
    }
}
