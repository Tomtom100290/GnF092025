<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $codeTag = null;

    /**
     * @var Collection<int, TypeProduit>
     */
    #[ORM\ManyToMany(targetEntity: TypeProduit::class, mappedBy: 'fkTagProduit')]
    private Collection $Typeproduits;

    public function __construct()
    {
        $this->Typeproduits = new ArrayCollection();
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

    public function getCodeTag(): ?string
    {
        return $this->codeTag;
    }

    public function setCodeTag(?string $codeTag): static
    {
        $this->codeTag = $codeTag;

        return $this;
    }

    /**
     * @return Collection<int, TypeProduit>
     */
    public function getProduits(): Collection
    {
        return $this->Typeproduits;
    }

    public function addProduit(TypeProduit $Typeproduit): static
    {
        if (!$this->Typeproduits->contains($Typeproduit)) {
            $this->Typeproduits->add($Typeproduit);
            $Typeproduit->addFkTagProduit($this);
        }

        return $this;
    }

    public function removeProduit(TypeProduit $Typeproduit): static
    {
        if ($this->Typeproduits->removeElement($Typeproduit)) {
            $Typeproduit->removeFkTagProduit($this);
        }

        return $this;
    }
}
