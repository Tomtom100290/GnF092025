<?php

namespace App\Entity;

use App\Repository\PageCadeauRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageCadeauRepository::class)]
class PageCadeau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $h1 = null;

    #[ORM\Column(length: 255)]
    private ?string $h2 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $paragraphe = null;

    #[ORM\Column(length: 255)]
    private ?string $img = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getH1(): ?string
    {
        return $this->h1;
    }

    public function setH1(string $h1): static
    {
        $this->h1 = $h1;

        return $this;
    }

    public function getH2(): ?string
    {
        return $this->h2;
    }

    public function setH2(string $h2): static
    {
        $this->h2 = $h2;

        return $this;
    }

    public function getParagraphe(): ?string
    {
        return $this->paragraphe;
    }

    public function setParagraphe(string $paragraphe): static
    {
        $this->paragraphe = $paragraphe;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): static
    {
        $this->img = $img;

        return $this;
    }
}
