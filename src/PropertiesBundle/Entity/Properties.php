<?php

namespace PropertiesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Properties
 *
 * @ORM\Table(name="properties")
 * @ORM\Entity(repositoryClass="PropertiesBundle\Repository\PropertiesRepository")
 */
class Properties
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var int
     *
     * @ORM\Column(name="pricing", type="integer")
     */
    private $pricing;

    /**
     * @var int
     *
     * @ORM\Column(name="rooms", type="integer")
     */
    private $rooms;

    /**
     * @var int
     *
     * @ORM\Column(name="max_guests", type="integer")
     */
    private $maxGuests;


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
     * Set name
     *
     * @param string $name
     *
     * @return Properties
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Properties
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set pricing
     *
     * @param integer $pricing
     *
     * @return Properties
     */
    public function setPricing($pricing)
    {
        $this->pricing = $pricing;

        return $this;
    }

    /**
     * Get pricing
     *
     * @return int
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    /**
     * Set rooms
     *
     * @param integer $rooms
     *
     * @return Properties
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }

    /**
     * Get rooms
     *
     * @return int
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set maxGuests
     *
     * @param integer $maxGuests
     *
     * @return Properties
     */
    public function setMaxGuests($maxGuests)
    {
        $this->maxGuests = $maxGuests;

        return $this;
    }

    /**
     * Get maxGuests
     *
     * @return int
     */
    public function getMaxGuests()
    {
        return $this->maxGuests;
    }
}

