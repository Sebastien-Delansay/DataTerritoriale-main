<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ComptabiliteRepository;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: ComptabiliteRepository::class)]
#[ApiResource]
class Comptabilite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float', nullable: true)]
    #[ApiProperty(security: "is_granted('ROLE_ADMIN')")]
    private $can1;

    #[ORM\Column(type: 'float', nullable: true)]
    #[ApiProperty(security: "is_granted('ROLE_ADMIN')")]
    private $can2;

    #[ORM\Column(type: 'float', nullable: true)]
    #[ApiProperty(security: "is_granted('ROLE_ADMIN')")]
    private $can3;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $franchise;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[ApiProperty(security: "is_granted('ROLE_ADMIN')")]
    private $employe;

    #[ORM\Column(type: 'float', nullable: true)]
    #[ApiProperty(security: "is_granted('ROLE_ADMIN')")]
    private $superficie;

    #[ORM\Column(type: 'text', nullable: true)]
    private $commentaire;

    #[ORM\OneToOne(inversedBy: 'comptabilite', targetEntity: Commerce::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $commerce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCan1(): ?float
    {
        return $this->can1;
    }

    public function setCan1(?float $can1): self
    {
        $this->can1 = $can1;

        return $this;
    }

    public function getCan2(): ?float
    {
        return $this->can2;
    }

    public function setCan2(?float $can2): self
    {
        $this->can2 = $can2;

        return $this;
    }

    public function getCan3(): ?float
    {
        return $this->can3;
    }

    public function setCan3(?float $can3): self
    {
        $this->can3 = $can3;

        return $this;
    }

    public function getFranchise(): ?bool
    {
        return $this->franchise;
    }

    public function setFranchise(?bool $franchise): self
    {
        $this->franchise = $franchise;

        return $this;
    }

    public function getEmploye(): ?int
    {
        return $this->employe;
    }

    public function setEmploye(?int $employe): self
    {
        $this->employe = $employe;

        return $this;
    }

    public function getSuperficie(): ?float
    {
        return $this->superficie;
    }

    public function setSuperficie(?float $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

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
