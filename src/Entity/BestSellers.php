<?php

namespace App\Entity;

use App\Repository\BestSellersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BestSellersRepository::class)]
class BestSellers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $produit1 = null;

    #[ORM\Column(length: 255)]
    private ?string $produit2 = null;

    #[ORM\Column(length: 255)]
    private ?string $produit3 = null;

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

    public function getProduit1(): ?string
    {
        return $this->produit1;
    }

    public function setProduit1(string $produit1): static
    {
        $this->produit1 = $produit1;

        return $this;
    }

    public function getProduit2(): ?string
    {
        return $this->produit2;
    }

    public function setProduit2(string $produit2): static
    {
        $this->produit2 = $produit2;

        return $this;
    }

    public function getProduit3(): ?string
    {
        return $this->produit3;
    }

    public function setProduit3(string $produit3): static
    {
        $this->produit3 = $produit3;

        return $this;
    }
}
