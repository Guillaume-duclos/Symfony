<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StopRepository")
 */
class Stop
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=32)
     */
    private $id;

    /**
     * @var StopTime[]
     * @ORM\OneToMany(targetEntity="StopTime", mappedBy="stop")
     */
    private $stopTimes;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=7)
     */
    private $latitude;

    /**
     * @var float
     * @ORM\Column(type="decimal", precision=10, scale=7)
     */
    private $longitude;

    /**
     * @var int
     * @ORM\Column(type="smallint")
     */
    private $locationType;

    /**
     * @ORM\OneToOne(targetEntity="Stop")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $isWheelchairBoarding;
}
