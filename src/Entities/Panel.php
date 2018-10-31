<?php

namespace Portal\Entities;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Model\UnityOfWork;

/**
 * This class represents a panel item.
 * @ORM\Entity()
 * @ORM\Table(name="panel")
 */
class Panel extends UnityOfWork {

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     * @Annotation\Options({
     * "label": "Title",
     * "label_attributes": {"class": "col-lg-4 col-md-4 col-sm-4 col-form-label"}
     * })
     * @Annotation\Attributes({"class":"form-control", "placeholder":"Name"})
     */
    protected $title;

    /**
     * @ORM\Column(name="content", type="text", nullable=true)
     * @Annotation\Options({
     * "label": "Content",
     * "label_attributes": {"class": "col-lg-4 col-md-4 col-sm-4 col-form-label"}
     * })
     * @Annotation\Attributes({"class":"form-control", "placeholder":"Name"})
     */
    protected $content;

    /**
     * @ORM\Column(name="link", type="string", length=255, nullable=false)
     * @Annotation\Options({
     * "label": "Link",
     * "label_attributes": {"class": "col-lg-4 col-md-4 col-sm-4 col-form-label"}
     * })
     * @Annotation\Attributes({"class":"form-control", "placeholder":"Name"})
     */
    protected $link;

    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getContent() {
        return $this->content;
    }

    function getLink() {
        return $this->link;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setLink($link) {
        $this->link = $link;
    }

}
