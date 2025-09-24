<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 14)]
    private ?string $Tel1 = null;

    #[ORM\Column(length: 14, nullable: true)]
    private ?string $Tel2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Rue = null;

    #[ORM\Column(length: 5)]
    private ?string $codePostal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $infoCompl = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Ville = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateCreation = null;

    #[ORM\Column]
    private ?bool $topActif = null;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTel1(): ?string
    {
        return $this->Tel1;
    }

    public function setTel1(string $Tel1): static
    {
        $this->Tel1 = $Tel1;

        return $this;
    }

    public function getTel2(): ?string
    {
        return $this->Tel2;
    }

    public function setTel2(?string $Tel2): static
    {
        $this->Tel2 = $Tel2;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->Rue;
    }

    public function setRue(?string $Rue): static
    {
        $this->Rue = $Rue;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getInfoCompl(): ?string
    {
        return $this->infoCompl;
    }

    public function setInfoCompl(?string $infoCompl): static
    {
        $this->infoCompl = $infoCompl;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(?string $Ville): static
    {
        $this->Ville = $Ville;

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
