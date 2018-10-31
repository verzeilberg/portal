<?php

namespace Portal\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PortalController extends AbstractActionController {

    protected $vhm;
    protected $em;
    protected $panelService;

    public function __construct($vhm, $em, $panelService) {
        $this->vhm = $vhm;
        $this->em = $em;
        $this->panelService = $panelService;
    }

    public function indexAction() {
        $panels = $this->panelService->getPanels();

        return new ViewModel(
                array(
            'panels' => $panels
                )
        );
    }

    public function addAction() {
        $panel = $this->panelService->newPanel();
        $form = $this->panelService->createForm($panel);

        return new ViewModel(
                array(
            'form' => $form
                )
        );
    }

}
