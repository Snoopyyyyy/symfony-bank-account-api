<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $icon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Operation::class)]
    private Collection $operations;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Prelevement::class)]
    private Collection $prelevements;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
        $this->prelevements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Operation>
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations->add($operation);
            $operation->setCategorie($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->removeElement($operation)) {
            // set the owning side to null (unless already changed)
            if ($operation->getCategorie() === $this) {
                $operation->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prelevement>
     */
    public function getPrelevements(): Collection
    {
        return $this->prelevements;
    }

    public function addPrelevement(Prelevement $prelevement): self
    {
        if (!$this->prelevements->contains($prelevement)) {
            $this->prelevements->add($prelevement);
            $prelevement->setCategorie($this);
        }

        return $this;
    }

    public function removePrelevement(Prelevement $prelevement): self
    {
        if ($this->prelevements->removeElement($prelevement)) {
            // set the owning side to null (unless already changed)
            if ($prelevement->getCategorie() === $this) {
                $prelevement->setCategorie(null);
            }
        }

        return $this;
    }
}
