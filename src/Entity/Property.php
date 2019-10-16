<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PropertyRepository")
 */
class Property
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *  min=3,
     *  minMessage = "L'adresse doit contenir {{ limit }} caractères minimum"
     * )
     */
    private $adress;

    /**
     * @ORM\Column(type="integer")
     * @Assert\GreaterThanOrEqual(
     *  value = 1,
     *  message = "Le bien doit contenir au moinhs une chambre !"
     * )
     */
    private $rooms;

    /**
     * @ORM\Column(type="float")
     * @Assert\GreaterThanOrEqual(
     *  value = 5,
     *  message = "La surface doit être d'au moins 5m² !"
     * )
     */
    private $surface;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeProperty", inversedBy="properties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getType(): ?TypeProperty
    {
        return $this->type;
    }

    public function setType(?TypeProperty $type): self
    {
        $this->type = $type;

        return $this;
    }
}
