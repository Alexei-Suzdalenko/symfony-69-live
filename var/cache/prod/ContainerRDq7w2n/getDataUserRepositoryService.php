<?php

namespace ContainerRDq7w2n;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDataUserRepositoryService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Repository\DataUserRepository' shared autowired service.
     *
     * @return \App\Repository\DataUserRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Repository\\DataUserRepository'] = new \App\Repository\DataUserRepository(($container->services['doctrine'] ?? $container->load('getDoctrineService')), ($container->services['doctrine.orm.default_entity_manager'] ?? $container->load('getDoctrine_Orm_DefaultEntityManagerService')));
    }
}
