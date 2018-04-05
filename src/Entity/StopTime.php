<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StopTimeRepository")
 */
class StopTime
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=32)
     */
    private $id;

    /**
     * @var Trip
     * @ORM\ManyToOne(targetEntity="Trip", inversedBy="stopTimes")
     */
    private $trip;

    /**
     * @var Stop
     * @ORM\ManyToOne(targetEntity="Stop", inversedBy="stopTimes")
     */
    private $stop;

    /**
     * @var \DateTime
     * @ORM\Column(type="time")
     */
    private $arrival;

    /**
     * @var \DateTime
     * @ORM\Column(type="time")
     */
    private $departure;

    /**
     * @var int
     * @ORM\Column(type="smallint")
     */
    private $stopSequence;
}
