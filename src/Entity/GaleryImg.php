<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GaleryImgRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GaleryImgRepository::class)]
#[ApiResource]
class GaleryImg
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Room::class, inversedBy: 'galeryImgs')]
    private $rooms;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRooms(): ?Room
    {
        return $this->rooms;
    }

    public function setRooms(?Room $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }
}
