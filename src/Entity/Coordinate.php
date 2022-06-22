<?php

namespace App\Entity;

use App\Repository\CoordinateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoordinateRepository::class)]
class Coordinate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $x;

    #[ORM\Column(type: 'integer')]
    private $y;

    #[ORM\ManyToOne(targetEntity: Boat::class, inversedBy: 'coordinates', cascade:[ 'persist'])]
    private $boat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getX(): ?int
    {
        return $this->x;
    }

    public function setX(int $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): ?int
    {
        return $this->y;
    }

    public function setY(int $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function getBoat(): ?Boat
    {
        return $this->boat;
    }

    public function setBoat(?Boat $boat): self
    {
        $this->boat = $boat;

        return $this;
    }
}
