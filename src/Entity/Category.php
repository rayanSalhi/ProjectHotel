<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Type_chambre = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Chambre::class)]
    private Collection $chambres;

    public function __construct()
    {
        $this->chambres = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getTypeChambre();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeChambre(): ?string
    {
        return $this->Type_chambre;
    }

    public function setTypeChambre(string $Type_chambre): self
    {
        $this->Type_chambre = $Type_chambre;

        return $this;
    }

    /**
     * @return Collection<int, Chambre>
     */
    public function getChambres(): Collection
    {
        return $this->chambres;
    }

    public function addChambre(Chambre $chambre): self
    {
        if (!$this->chambres->contains($chambre)) {
            $this->chambres->add($chambre);
            $chambre->setCategory($this);
        }

        return $this;
    }

    public function removeChambre(Chambre $chambre): self
    {
        if ($this->chambres->removeElement($chambre)) {
            // set the owning side to null (unless already changed)
            if ($chambre->getCategory() === $this) {
                $chambre->setCategory(null);
            }
        }

        return $this;
    }
}
