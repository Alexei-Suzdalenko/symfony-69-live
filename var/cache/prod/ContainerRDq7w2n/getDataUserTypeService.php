<?php

namespace ContainerRDq7w2n;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDataUserTypeService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Form\DataUserType' shared autowired service.
     *
     * @return \App\Form\DataUserType
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Form\\DataUserType'] = new \App\Form\DataUserType();
    }
}
