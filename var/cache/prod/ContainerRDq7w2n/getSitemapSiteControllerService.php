<?php

namespace ContainerRDq7w2n;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSitemapSiteControllerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'App\Controller\SitemapSiteController' shared autowired service.
     *
     * @return \App\Controller\SitemapSiteController
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['App\\Controller\\SitemapSiteController'] = $instance = new \App\Controller\SitemapSiteController(($container->privates['App\\Repository\\DataUserRepository'] ?? $container->load('getDataUserRepositoryService')));

        $instance->setContainer(($container->privates['.service_locator.g9CqTPp'] ?? $container->load('get_ServiceLocator_G9CqTPpService'))->withContext('App\\Controller\\SitemapSiteController', $container));

        return $instance;
    }
}
