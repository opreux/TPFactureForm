<?php

namespace App\Entity;

use App\Entity\Detail;
use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "SEQUENCE")]
    #[ORM\SequenceGenerator(sequenceName:"produit_seq",initialValue:8)]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5, unique: true)]
    private ?string $npro = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column]
    private ?int $qstock = null;

    #[ORM\OneToMany(mappedBy: 'npro', targetEntity: Detail::class, orphanRemoval: true, cascade:['remove'])]
    private Collection $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNpro(): ?string
    {
        return $this->npro;
    }

    public function setNpro(string $npro): self
    {
        $this->npro = $npro;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQstock(): ?int
    {
        return $this->qstock;
    }

    public function setQstock(int $qstock): self
    {
        $this->qstock = $qstock;

        return $this;
    }

    public function __toString(): string 
    {
        return $this->getLibelle();
    }

    /**
     * @return Collection<int, Detail>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetails(Detail $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details->add($detail);
            $detail->setNpro($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): self
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getNpro() === $this) {
                $detail->setNpro(null);
            }
        }

        return $this;
    }

    public function addDetail(Detail $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details->add($detail);
            $detail->setNpro($this);
        }

        return $this;
    }
}
