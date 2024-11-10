<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Coiffeur = null;

    #[ORM\Column(length: 255)]
    private ?string $SPA = null;

    #[ORM\Column(length: 255)]
    private ?string $Manucure = null;

    #[ORM\Column(length: 255)]
    private ?string $Barbier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoiffeur(): ?string
    {
        return $this->Coiffeur;
    }

    public function setCoiffeur(string $Coiffeur): static
    {
        $this->Coiffeur = $Coiffeur;

        return $this;
    }

    public function getSPA(): ?string
    {
        return $this->SPA;
    }

    public function setSPA(string $SPA): static
    {
        $this->SPA = $SPA;

        return $this;
    }

    public function getManucure(): ?string
    {
        return $this->Manucure;
    }

    public function setManucure(string $Manucure): static
    {
        $this->Manucure = $Manucure;

        return $this;
    }

    public function getBarbier(): ?string
    {
        return $this->Barbier;
    }

    public function setBarbier(string $Barbier): static
    {
        $this->Barbier = $Barbier;

        return $this;
    }
}
