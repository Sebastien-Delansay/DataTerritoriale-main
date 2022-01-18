<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DimancheRepository;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: DimancheRepository::class)]
#[ApiResource(collectionOperations: [
    "get",
    "post" => ["security" => "is_granted('ROLE_USER')"]    
])]
class Dimanche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'time', nullable: true)]
    private $ouverturematin;

    #[ORM\Column(type: 'time', nullable: true)]
    private $fermeturematin;

    #[ORM\Column(type: 'time', nullable: true)]
    private $ouvertureaprem;

    #[ORM\Column(type: 'time', nullable: true)]
    private $fermetureaprem;

    #[ORM\OneToOne(inversedBy: 'dimanche', targetEntity: Commerce::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $commerce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOuverturematin(): ?\DateTimeInterface
    {
        return $this->ouverturematin;
    }

    public function setOuverturematin(?\DateTimeInterface $ouverturematin): self
    {
        $this->ouverturematin = $ouverturematin;

        return $this;
    }

    public function getFermeturematin(): ?\DateTimeInterface
    {
        return $this->fermeturematin;
    }

    public function setFermeturematin(?\DateTimeInterface $fermeturematin): self
    {
        $this->fermeturematin = $fermeturematin;

        return $this;
    }

    public function getOuvertureaprem(): ?\DateTimeInterface
    {
        return $this->ouvertureaprem;
    }

    public function setOuvertureaprem(?\DateTimeInterface $ouvertureaprem): self
    {
        $this->ouvertureaprem = $ouvertureaprem;

        return $this;
    }

    public function getFermetureaprem(): ?\DateTimeInterface
    {
        return $this->fermetureaprem;
    }

    public function setFermetureaprem(?\DateTimeInterface $fermetureaprem): self
    {
        $this->fermetureaprem = $fermetureaprem;

        return $this;
    }

    public function getCommerce(): ?Commerce
    {
        return $this->commerce;
    }

    public function setCommerce(Commerce $commerce): self
    {
        $this->commerce = $commerce;

        return $this;
    }
}
