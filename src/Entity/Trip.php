<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TripRepository")
 */
class Trip
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=32)
     */
    private $id;

    /**
     * @var Route
     * @ORM\ManyToOne(targetEntity="Route", inversedBy="trips")
     */
    private $route;

    /**
     * @var StopTime[]
     * @ORM\OneToMany(targetEntity="StopTime", mappedBy="trip")
     */
    private $stopTimes;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    private $headsign;

    /**
     *
     * @var int
     * @ORM\Column(type="smallint")
     */
    private $direction;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $isWheelchairAccessible;

}
