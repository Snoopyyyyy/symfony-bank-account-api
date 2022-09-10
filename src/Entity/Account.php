<?php

namespace App\Entity;

use App\Repository\AccountRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccountRepository::class)]
class Account
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\ManyToOne(inversedBy: 'accounts')]
    private ?User $owner = null;

    #[ORM\OneToMany(mappedBy: 'account', targetEntity: Solde::class)]
    private Collection $soldes;

    #[ORM\OneToMany(mappedBy: 'account', targetEntity: Operation::class)]
    private Collection $operations;

    #[ORM\OneToMany(mappedBy: 'account', targetEntity: Prelevement::class)]
    private Collection $prelevements;

    public function __construct()
    {
        $this->soldes = new ArrayCollection();
        $this->operations = new ArrayCollection();
        $this->prelevements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection<int, Solde>
     */
    public function getSoldes(): Collection
    {
        return $this->soldes;
    }

    public function addSolde(Solde $solde): self
    {
        if (!$this->soldes->contains($solde)) {
            $this->soldes->add($solde);
            $solde->setAccount($this);
        }

        return $this;
    }

    public function removeSolde(Solde $solde): self
    {
        if ($this->soldes->removeElement($solde)) {
            // set the owning side to null (unless already changed)
            if ($solde->getAccount() === $this) {
                $solde->setAccount(null);
            }
        }

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
            $operation->setAccount($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->removeElement($operation)) {
            // set the owning side to null (unless already changed)
            if ($operation->getAccount() === $this) {
                $operation->setAccount(null);
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
            $prelevement->setAccount($this);
        }

        return $this;
    }

    public function removePrelevement(Prelevement $prelevement): self
    {
        if ($this->prelevements->removeElement($prelevement)) {
            // set the owning side to null (unless already changed)
            if ($prelevement->getAccount() === $this) {
                $prelevement->setAccount(null);
            }
        }

        return $this;
    }
}
