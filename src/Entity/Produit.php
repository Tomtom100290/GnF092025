<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

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

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $tag = null;

    #[ORM\Column(length: 100)]
    private ?string $NumLot = null;

    #[ORM\Column(length: 50)]
    private ?string $Categorie = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateCreation = null;

    #[ORM\Column]
    private ?bool $topActif = null;

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

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(?string $tag): static
    {
        $this->tag = $tag;

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

    public function getCategorie(): ?string
    {
        return $this->Categorie;
    }

    public function setCategorie(string $Categorie): static
    {
        $this->Categorie = $Categorie;

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
}
