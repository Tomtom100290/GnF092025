<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateAchat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $dlc = null;


    #[ORM\Column(length: 100)]
    private ?string $NumLot = null;


    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateCreation = null;
    #[ORM\PrePersist]
     public function setDateDeCreation(): void
    {
        if ($this->dateCreation === null) {
            $this->dateCreation = new \DateTimeImmutable();
        }
    }

    #[ORM\Column]
    private ?bool $topActif = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?categorie $fkCategorieProduit = null;

    /**
     * @var Collection<int, Tag>
     */
    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'produits')]
    private Collection $fkTagProduit;

    #[ORM\Column(length: 30)]
    private ?string $slug = null;

    #[ORM\Column(nullable: true)]
    private ?float $prix = null;

   /* #[ORM\Column(length: 255)]
    private ?string $illustration = null;*/

    public function __construct()
    {
        $this->fkTagProduit = new ArrayCollection();
    }
   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateAchat(): ?\DateTime
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTime $dateAchat): static
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getDlc(): ?\DateTime
    {
        return $this->dlc;
    }

    public function setDlc(?\DateTime $dlc): static
    {
        $this->dlc = $dlc;

        return $this;
    }


    public function getNumLot(): ?string
    {
        return $this->NumLot;
    }

    public function setNumLot(string $NumLot): static
    {
        $this->NumLot = $NumLot;

        return $this;
    }

    
    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeImmutable $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function isTopActif(): ?bool
    {
        return $this->topActif;
    }

    public function setTopActif(bool $topActif): static
    {
        $this->topActif = $topActif;

        return $this;
    }

    public function getFkCategorieProduit(): ?categorie
    {
        return $this->fkCategorieProduit;
    }

    public function setFkCategorieProduit(?categorie $fkCategorieProduit): static
    {
        $this->fkCategorieProduit = $fkCategorieProduit;

        return $this;
    }

    /**
     * @return Collection<int, tag>
     */
    public function getFkTagProduit(): Collection
    {
        return $this->fkTagProduit;
    }

    public function addFkTagProduit(tag $fkTagProduit): static
    {
        if (!$this->fkTagProduit->contains($fkTagProduit)) {
            $this->fkTagProduit->add($fkTagProduit);
        }

        return $this;
    }

    public function removeFkTagProduit(tag $fkTagProduit): static
    {
        $this->fkTagProduit->removeElement($fkTagProduit);

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

   /* public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(string $illustration): static
    {
        $this->illustration = $illustration;

        return $this;
    }*/

   public function getPrix(): ?float
   {
       return $this->prix;
   }

   public function setPrix(?float $prix): static
   {
       $this->prix = $prix;

       return $this;
   }
}
