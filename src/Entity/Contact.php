<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 14)]
    private ?string $tel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $urlInsta = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $urlFacebook = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $infoSupp = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getUrlInsta(): ?string
    {
        return $this->urlInsta;
    }

    public function setUrlInsta(?string $urlInsta): static
    {
        $this->urlInsta = $urlInsta;

        return $this;
    }

    public function getUrlFacebook(): ?string
    {
        return $this->urlFacebook;
    }

    public function setUrlFacebook(?string $urlFacebook): static
    {
        $this->urlFacebook = $urlFacebook;

        return $this;
    }

    public function getInfoSupp(): ?string
    {
        return $this->infoSupp;
    }

    public function setInfoSupp(?string $infoSupp): static
    {
        $this->infoSupp = $infoSupp;

        return $this;
    }
}
