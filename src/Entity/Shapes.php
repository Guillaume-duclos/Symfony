<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShapesRepository")
 */
class Shapes {
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $shape_id;

    /**
     * @ORM\Column(type="float")
     */
    private $shape_pt_lat;

    /**
     * @ORM\Column(type="float")
     */
    private $shape_pt_lon;

    /**
     * @ORM\Column(type="integer")
     */
    private $shape_pt_sequence;
}
