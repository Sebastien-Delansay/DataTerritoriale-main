<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\GerantRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: GerantRepository::class)]
#[ApiResource]
class Gerant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prenom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $telfixe;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $telport;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $numero;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $bis;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $voie;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $rue;

    #[ORM\Column(type: 'text', nullable: true)]
    private $complement;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $postale;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ville;

    #[ORM\OneToMany(mappedBy: 'gerant', targetEntity: Commerce::class)]
    private $commerce;

    public function __construct()
    {
        $this->commerce = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelfixe(): ?int
    {
        return $this->telfixe;
    }

    public function setTelfixe(?int $telfixe): self
    {
        $this->telfixe = $telfixe;

        return $this;
    }

    public function getTelport(): ?int
    {
        return $this->telport;
    }

    public function setTelport(?int $telport): self
    {
        $this->telport = $telport;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getBis(): ?string
    {
        return $this->bis;
    }

    public function setBis(?string $bis): self
    {
        $this->bis = $bis;

        return $this;
    }

    public function getVoie(): ?string
    {
        return $this->voie;
    }

    public function setVoie(?string $voie): self
    {
        $this->voie = $voie;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(?string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function setComplement(?string $complement): self
    {
        $this->complement = $complement;

        return $this;
    }

    public function getPostale(): ?int
    {
        return $this->postale;
    }

    public function setPostale(?int $postale): self
    {
        $this->postale = $postale;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection|Commerce[]
     */
    public function getCommerce(): Collection
    {
        return $this->commerce;
    }

    public function addCommerce(Commerce $commerce): self
    {
        if (!$this->commerce->contains($commerce)) {
            $this->commerce[] = $commerce;
            $commerce->setGerant($this);
        }

        return $this;
    }

    public function removeCommerce(Commerce $commerce): self
    {
        if ($this->commerce->removeElement($commerce)) {
            // set the owning side to null (unless already changed)
            if ($commerce->getGerant() === $this) {
                $commerce->setGerant(null);
            }
        }

        return $this;
    }
}
