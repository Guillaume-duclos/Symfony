<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RouteRepository")
 */
class Route
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=32)
     */
    private $id;

    /**
     * @var Trip[]
     * @ORM\OneToMany(targetEntity="Trip", mappedBy="route")
     */
    private $trips;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $shortName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $longName;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $color;
}
