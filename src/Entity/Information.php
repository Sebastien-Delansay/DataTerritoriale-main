<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\InformationRepository;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: InformationRepository::class)]
#[ApiResource]
class Information
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[ApiProperty(security: "is_granted('ROLE_MAIRIE')")]
    private $datecrea;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $raisonsociale;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[ApiProperty(security: "is_granted('ROLE_MAIRIE')")]
    private $statut;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $siret;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $siren;

    #[ORM\OneToOne(inversedBy: 'information', targetEntity: Commerce::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $commerce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatecrea(): ?\DateTimeInterface
    {
        return $this->datecrea;
    }

    public function setDatecrea(?\DateTimeInterface $datecrea): self
    {
        $this->datecrea = $datecrea;

        return $this;
    }

    public function getRaisonsociale(): ?string
    {
        return $this->raisonsociale;
    }

    public function setRaisonsociale(?string $raisonsociale): self
    {
        $this->raisonsociale = $raisonsociale;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getSiret(): ?int
    {
        return $this->siret;
    }

    public function setSiret(?int $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getSiren(): ?int
    {
        return $this->siren;
    }

    public function setSiren(?int $siren): self
    {
        $this->siren = $siren;

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
