<?php


namespace Certificate\Factory;


use Certificate\Repository\CertificateRepositoryInterface;
use Certificate\Service\CertificateService;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

class CertificateServiceFactory implements \Laminas\ServiceManager\FactoryInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CertificateService($container->get(CertificateRepositoryInterface::class));
    }

    /**
     * @inheritDoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // TODO: Implement createService() method.
    }
}