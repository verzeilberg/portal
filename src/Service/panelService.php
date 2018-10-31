<?php

namespace Portal\Service;

use Zend\ServiceManager\ServiceLocatorInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineORMModule\Form\Annotation\AnnotationBuilder;

/*
 * Entities
 */
use Portal\Entities\Panel;

class panelService implements panelServiceInterface {

    /**
     * Constructor.
     */
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     *
     * Get array of panels
     *
     * @return      array
     *
     */
    public function getPanels() {

        $panels = $this->entityManager->getRepository(Panel::class)
                ->findBy([], ['dateCreated' => 'DESC']);

        return $panels;
    }

    /**
     *
     * Get panel object by on id
     *
     * @param       id  $id The id to fetch the panel from the database
     * @return      object
     *
     */
    public function getPanel($id) {
        $panel = $this->entityManager->getRepository(Panel::class)
                ->findOneBy(['id' => $id], []);

        return $panel;
    }
    
        /**
     *
     * Create form of an object
     *
     * @param       panelt $panel
     * @return      form
     *
     */
    public function createForm($panel) {
        $builder = new AnnotationBuilder($this->entityManager);
        $form = $builder->createForm($panel);
        $form->setHydrator(new DoctrineHydrator($this->entityManager, 'Portal\Entity\Panel'));
        $form->bind($panel);

        return $form;
    }

    /**
     *
     * Create a new panel object
     * @return      object
     *
     */
    public function newPanel() {
        $panel = new Panel();
        return $panel;
    }

    /**
     *
     * Save a panel to database
     * @param       panel $panel object
     * @return      void
     *
     */
    public function savePanel($panel) {
        $this->entityManager->persist($panel);
        $this->entityManager->flush();
    }

    /**
     *
     * Delete a panel from database
     * @param       panel $panel object
     * @return      void
     *
     */
    public function deletePanel($panel) {
        $this->entityManager->remove($panel);
        $this->entityManager->flush();
    }

}
