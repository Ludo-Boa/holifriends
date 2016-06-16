<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voyage
 */
class Voyage
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $destination;

    /**
     * @var \DateTime
     */
    private $dateDepart;

    /**
     * @var int
     */
    private $nombreJours;

    /**
     * @var int
     */
    private $cout;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Voyage
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set destination
     *
     * @param string $destination
     * @return Voyage
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string 
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     * @return Voyage
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime 
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set nombreJours
     *
     * @param integer $nombreJours
     * @return Voyage
     */
    public function setNombreJours($nombreJours)
    {
        $this->nombreJours = $nombreJours;

        return $this;
    }

    /**
     * Get nombreJours
     *
     * @return integer 
     */
    public function getNombreJours()
    {
        return $this->nombreJours;
    }

    /**
     * Set cout
     *
     * @param integer $cout
     * @return Voyage
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get cout
     *
     * @return integer 
     */
    public function getCout()
    {
        return $this->cout;
    }
}
