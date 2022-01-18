<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommerceRepository;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: CommerceRepository::class)]
#[ApiResource(collectionOperations: [
    "get",
    "post" => ["security" => "is_granted('ROLE_USER')"],
])]
class Commerce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

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

    #[ORM\Column(type: 'float', nullable: true)]
    private $latitude;

    #[ORM\Column(type: 'float', nullable: true)]
    private $longitude;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $telephone;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fax;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $typologie;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $pmr;

    #[ORM\OneToOne(mappedBy: 'commerce', targetEntity: Lundi::class, cascade: ['persist', 'remove'])]
    private $lundi;

    #[ORM\OneToOne(mappedBy: 'commerce', targetEntity: Mardi::class, cascade: ['persist', 'remove'])]
    private $mardi;

    #[ORM\OneToOne(mappedBy: 'commerce', targetEntity: Mercredi::class, cascade: ['persist', 'remove'])]
    private $mercredi;

    #[ORM\OneToOne(mappedBy: 'commerce', targetEntity: Jeudi::class, cascade: ['persist', 'remove'])]
    private $jeudi;

    #[ORM\OneToOne(mappedBy: 'commerce', targetEntity: Vendredi::class, cascade: ['persist', 'remove'])]
    private $vendredi;

    #[ORM\OneToOne(mappedBy: 'commerce', targetEntity: Samedi::class, cascade: ['persist', 'remove'])]
    private $samedi;

    #[ORM\OneToOne(mappedBy: 'commerce', targetEntity: Dimanche::class, cascade: ['persist', 'remove'])]
    private $dimanche;

    #[ORM\OneToOne(mappedBy: 'commerce', targetEntity: Information::class, cascade: ['persist', 'remove'])]
    private $information;

    #[ORM\OneToOne(mappedBy: 'commerce', targetEntity: Comptabilite::class, cascade: ['persist', 'remove'])]
    private $comptabilite;

    #[ORM\ManyToOne(targetEntity: Gerant::class, inversedBy: 'commerce')]
    #[ApiProperty(security: "is_granted('ROLE_ADMIN')")]
    private $gerant;

    #[ORM\ManyToOne(targetEntity: Proprietaire::class, inversedBy: 'commerce')]
    #[ApiProperty(security: "is_granted('ROLE_USER')")]
    private $proprietaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): self
    {
        $this->longitude = $longitude;

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

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getFax(): ?int
    {
        return $this->fax;
    }

    public function setFax(?int $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getTypologie(): ?string
    {
        return $this->typologie;
    }

    public function setTypologie(?string $typologie): self
    {
        $this->typologie = $typologie;

        return $this;
    }

    public function getPmr(): ?bool
    {
        return $this->pmr;
    }

    public function setPmr(?bool $pmr): self
    {
        $this->pmr = $pmr;

        return $this;
    }

    public function getLundi(): ?Lundi
    {
        return $this->lundi;
    }

    public function setLundi(Lundi $lundi): self
    {
        // set the owning side of the relation if necessary
        if ($lundi->getCommerce() !== $this) {
            $lundi->setCommerce($this);
        }

        $this->lundi = $lundi;

        return $this;
    }

    public function getMardi(): ?Mardi
    {
        return $this->mardi;
    }

    public function setMardi(Mardi $mardi): self
    {
        // set the owning side of the relation if necessary
        if ($mardi->getCommerce() !== $this) {
            $mardi->setCommerce($this);
        }

        $this->mardi = $mardi;

        return $this;
    }

    public function getMercredi(): ?Mercredi
    {
        return $this->mercredi;
    }

    public function setMercredi(Mercredi $mercredi): self
    {
        // set the owning side of the relation if necessary
        if ($mercredi->getCommerce() !== $this) {
            $mercredi->setCommerce($this);
        }

        $this->mercredi = $mercredi;

        return $this;
    }

    public function getJeudi(): ?Jeudi
    {
        return $this->jeudi;
    }

    public function setJeudi(Jeudi $jeudi): self
    {
        // set the owning side of the relation if necessary
        if ($jeudi->getCommerce() !== $this) {
            $jeudi->setCommerce($this);
        }

        $this->jeudi = $jeudi;

        return $this;
    }

    public function getVendredi(): ?Vendredi
    {
        return $this->vendredi;
    }

    public function setVendredi(Vendredi $vendredi): self
    {
        // set the owning side of the relation if necessary
        if ($vendredi->getCommerce() !== $this) {
            $vendredi->setCommerce($this);
        }

        $this->vendredi = $vendredi;

        return $this;
    }

    public function getSamedi(): ?Samedi
    {
        return $this->samedi;
    }

    public function setSamedi(Samedi $samedi): self
    {
        // set the owning side of the relation if necessary
        if ($samedi->getCommerce() !== $this) {
            $samedi->setCommerce($this);
        }

        $this->samedi = $samedi;

        return $this;
    }

    public function getDimanche(): ?Dimanche
    {
        return $this->dimanche;
    }

    public function setDimanche(Dimanche $dimanche): self
    {
        // set the owning side of the relation if necessary
        if ($dimanche->getCommerce() !== $this) {
            $dimanche->setCommerce($this);
        }

        $this->dimanche = $dimanche;

        return $this;
    }

    public function getInformation(): ?Information
    {
        return $this->information;
    }

    public function setInformation(Information $information): self
    {
        // set the owning side of the relation if necessary
        if ($information->getCommerce() !== $this) {
            $information->setCommerce($this);
        }

        $this->information = $information;

        return $this;
    }

    public function getComptabilite(): ?Comptabilite
    {
        return $this->comptabilite;
    }

    public function setComptabilite(Comptabilite $comptabilite): self
    {
        // set the owning side of the relation if necessary
        if ($comptabilite->getCommerce() !== $this) {
            $comptabilite->setCommerce($this);
        }

        $this->comptabilite = $comptabilite;

        return $this;
    }

    public function getGerant(): ?Gerant
    {
        return $this->gerant;
    }

    public function setGerant(?Gerant $gerant): self
    {
        $this->gerant = $gerant;

        return $this;
    }

    public function getProprietaire(): ?Proprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Proprietaire $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }
}
