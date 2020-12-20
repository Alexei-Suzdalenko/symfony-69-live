<?php

namespace ContainerRDq7w2n;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMailer_TransportFactory_SendgridService extends App_KernelProdContainer
{
    /*
     * Gets the private 'mailer.transport_factory.sendgrid' shared service.
     *
     * @return \Symfony\Component\Mailer\Bridge\Sendgrid\Transport\SendgridTransportFactory
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['mailer.transport_factory.sendgrid'] = new \Symfony\Component\Mailer\Bridge\Sendgrid\Transport\SendgridTransportFactory(($container->services['event_dispatcher'] ?? $container->getEventDispatcherService()), NULL, ($container->privates['logger'] ?? ($container->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())));
    }
}
