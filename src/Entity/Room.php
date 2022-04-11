<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RoomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
#[ApiResource]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $name;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $shortdescription;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pictures;

    #[ORM\Column(type: 'integer')]
    private $capacity;

    #[ORM\Column(type: 'integer')]
    private $size;

    #[ORM\Column(type: 'integer')]
    private $bed;

    #[ORM\Column(type: 'integer')]
    private $price;

    #[ORM\Column(type: 'integer')]
    private $quantity_rooms;

    #[ORM\Column(type: 'string', length: 50)]
    private $breaksfast;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $header_room;

    #[ORM\ManyToOne(targetEntity: Hotel::class, inversedBy: 'rooms')]
    #[ORM\JoinColumn(nullable: false)]
    private $Hotel;

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

    public function getShortdescription(): ?string
    {
        return $this->shortdescription;
    }

    public function setShortdescription(?string $shortdescription): self
    {
        $this->shortdescription = $shortdescription;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPictures(): ?string
    {
        return $this->pictures;
    }

    public function setPictures(?string $pictures): self
    {
        $this->pictures = $pictures;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getBed(): ?int
    {
        return $this->bed;
    }

    public function setBed(int $bed): self
    {
        $this->bed = $bed;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantityRooms(): ?int
    {
        return $this->quantity_rooms;
    }

    public function setQuantityRooms(int $quantity_rooms): self
    {
        $this->quantity_rooms = $quantity_rooms;

        return $this;
    }

    public function getBreaksfast(): ?string
    {
        return $this->breaksfast;
    }

    public function setBreaksfast(string $breaksfast): self
    {
        $this->breaksfast = $breaksfast;

        return $this;
    }

    public function getHeaderRoom(): ?string
    {
        return $this->header_room;
    }

    public function setHeaderRoom(?string $header_room): self
    {
        $this->header_room = $header_room;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->Hotel;
    }

    public function setHotel(?Hotel $Hotel): self
    {
        $this->Hotel = $Hotel;

        return $this;
    }
}
