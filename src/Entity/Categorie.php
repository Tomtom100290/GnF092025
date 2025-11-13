<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

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

    /**
     * @var Collection<int, TypeProduit>
     */
    #[ORM\OneToMany(targetEntity: TypeProduit::class, mappedBy: 'fkCategorieProduit')]
    private Collection $Typeproduits;

    #[ORM\Column(length: 30)]
    private ?string $slug = null;

    #[ORM\Column(length: 3)]
    private ?string $codeCategorie = null;

    public function __construct()
    {
        $this->Typeproduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom ?? '';
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

    /**
     * @return Collection<int, TypeProduit>
     */
    public function getTypeProduits(): Collection
    {
        return $this->Typeproduits;
    }

    public function addTypeProduit(TypeProduit $Typeproduit): static
    {
        if (!$this->Typeproduits->contains($Typeproduit)) {
            $this->Typeproduits->add($Typeproduit);
            $Typeproduit->setFkCategorieProduit($this);
        }

        return $this;
    }

    public function removeProduit(TypeProduit $Typeproduit): static
    {
        if ($this->Typeproduits->removeElement($Typeproduit)) {
            // set the owning side to null (unless already changed)
            if ($Typeproduit->getFkCategorieProduit() === $this) {
                $Typeproduit->setFkCategorieProduit(null);
            }
        }

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

    public function getCodeCategorie(): ?string
    {
        return $this->codeCategorie;
    }

    public function setCodeCategorie(string $codeCategorie): static
    {
        $this->codeCategorie = $codeCategorie ? strtoupper($codeCategorie) : null;
        return $this;
    }
}
