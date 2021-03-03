<?php


namespace Certificate\Factory;


use Certificate\Controller\IndexController;
use Certificate\Service\CertificateService;
use Certificate\Service\RendererService;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements \Laminas\ServiceManager\FactoryInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IndexController($container->get(CertificateService::class), $container->get(RendererService::class));
    }

    /**
     * @inheritDoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // TODO: Implement createService() method.
    }
}