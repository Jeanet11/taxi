<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Course
 *
 * @ORM\Table(name="cou_course")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CourseRepository")
 */
class Course
{
    /**
     * @var int
     *
     * @ORM\Column(name="cou_oid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cou_distance", type="integer")
     */
    private $distance;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set distance
     *
     * @param integer $distance
     *
     * @return Course
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }

    
/**
     * Many Courses have Many Passagers.
     * @ORM\ManyToMany(targetEntity="Passager")
     * @ORM\JoinTable(name="npc_nn_cou_pas",
     *      joinColumns={@ORM\JoinColumn(name="cou_oid", referencedColumnName="cou_oid")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="pas_oid", referencedColumnName="pas_oid")}
     *      )
     */
     private $passagers;

     public function __construct() {
        $this->passagers = new \Doctrine\Common\Collections\ArrayCollection();
    }


/**
     * @ORM\ManyToOne(targetEntity="Chauffeur")
     * @ORM\JoinColumn(name="cha_oid", referencedColumnName="cha_oid")
     */
    private $chauffeur;

/**
     * @ORM\ManyToOne(targetEntity="Adresse")
     * @ORM\JoinColumn(name="adr_oid_debut", referencedColumnName="adr_oid")
     */
    private $adresse_debut;

/**
     * @ORM\ManyToOne(targetEntity="Adresse")
     * @ORM\JoinColumn(name="adr_oid_fin", referencedColumnName="adr_oid")
     */
    private $adresse_fin;



    /**
     * Add passager
     *
     * @param \AppBundle\Entity\Passager $passager
     *
     * @return Course
     */
    public function addPassager(\AppBundle\Entity\Passager $passager)
    {
        $this->passagers[] = $passager;

        return $this;
    }

    /**
     * Remove passager
     *
     * @param \AppBundle\Entity\Passager $passager
     */
    public function removePassager(\AppBundle\Entity\Passager $passager)
    {
        $this->passagers->removeElement($passager);
    }

    /**
     * Get passagers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPassagers()
    {
        return $this->passagers;
    }

    /**
     * Set chauffeur
     *
     * @param \AppBundle\Entity\Chauffeur $chauffeur
     *
     * @return Course
     */
    public function setChauffeur(\AppBundle\Entity\Chauffeur $chauffeur = null)
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }

    /**
     * Get chauffeur
     *
     * @return \AppBundle\Entity\Chauffeur
     */
    public function getChauffeur()
    {
        return $this->chauffeur;
    }

    /**
     * Set adresseDebut
     *
     * @param \AppBundle\Entity\Adresse $adresseDebut
     *
     * @return Course
     */
    public function setAdresseDebut(\AppBundle\Entity\Adresse $adresseDebut = null)
    {
        $this->adresse_debut = $adresseDebut;

        return $this;
    }

    /**
     * Get adresseDebut
     *
     * @return \AppBundle\Entity\Adresse
     */
    public function getAdresseDebut()
    {
        return $this->adresse_debut;
    }

    /**
     * Set adresseFin
     *
     * @param \AppBundle\Entity\Adresse $adresseFin
     *
     * @return Course
     */
    public function setAdresseFin(\AppBundle\Entity\Adresse $adresseFin = null)
    {
        $this->adresse_fin = $adresseFin;

        return $this;
    }

    /**
     * Get adresseFin
     *
     * @return \AppBundle\Entity\Adresse
     */
    public function getAdresseFin()
    {
        return $this->adresse_fin;
    }

    
}
