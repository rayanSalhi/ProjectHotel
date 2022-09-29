<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChambreRepository::class)]
class Chambre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $superficie = null;

    #[ORM\Column]
    private ?float $tarif = null;

    #[ORM\Column(length: 255)]
    private ?string $type_de_chambre = null;

    #[ORM\Column(length: 255)]
    private ?string $liste_options = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuperficie(): ?float
    {
        return $this->superficie;
    }

    public function setSuperficie(float $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(float $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getTypeDeChambre(): ?string
    {
        return $this->type_de_chambre;
    }

    public function setTypeDeChambre(string $type_de_chambre): self
    {
        $this->type_de_chambre = $type_de_chambre;

        return $this;
    }

    public function getListeOptions(): ?string
    {
        return $this->liste_options;
    }

    public function setListeOptions(string $liste_options): self
    {
        $this->liste_options = $liste_options;

        return $this;
    }
}
