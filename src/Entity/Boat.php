<?php

namespace App\Entity;

use App\Repository\BoatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoatRepository::class)]
class Boat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $size;

    #[ORM\OneToMany(mappedBy: 'boat', targetEntity: Coordinate::class, cascade: ['persist'])]
    private $coordinates;

    public function __construct()
    {
        $this->coordinates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return Collection<int, Coordinate>
     */
    public function getCoordinates(): Collection
    {
        return $this->coordinates;
    }

    public function addCoordinate(Coordinate $coordinate): self
    {
        if (!$this->coordinates->contains($coordinate)) {
            $this->coordinates[] = $coordinate;
            $coordinate->setBoat($this);
        }

        return $this;
    }

    public function removeCoordinate(Coordinate $coordinate): self
    {
        if ($this->coordinates->removeElement($coordinate)) {
            // set the owning side to null (unless already changed)
            if ($coordinate->getBoat() === $this) {
                $coordinate->setBoat(null);
            }
        }

        return $this;
    }
}
