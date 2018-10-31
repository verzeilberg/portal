<?php

namespace Portal\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Portal\Controller\PortalController;
use Portal\Service\panelService;

/**
 * This is the factory for AuthController. Its purpose is to instantiate the controller
 * and inject dependencies into its constructor.
 */
class PortalControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $vhm = $container->get('ViewHelperManager');
        $panelService = new panelService($entityManager);
        return new PortalController($vhm, $entityManager, $panelService);
    }

}
