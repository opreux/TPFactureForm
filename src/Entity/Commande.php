<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "SEQUENCE")]
    #[ORM\SequenceGenerator(sequenceName:"commande_seq",initialValue:8)]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5, unique: true)]
    private ?string $ncom = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $ncli = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datecom = null;

    #[ORM\OneToMany(mappedBy: 'ncom', targetEntity: Detail::class, orphanRemoval: true)]
    private Collection $details;


    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNcom(): ?string
    {
        return $this->ncom;
    }

    public function setNcom(string $ncom): self
    {
        $this->ncom = $ncom;

        return $this;
    }

    public function getNcli(): ?Client
    {
        return $this->ncli;
    }

    public function setNcli(?Client $ncli): self
    {
        $this->ncli = $ncli;

        return $this;
    }

    public function getDatecom(): ?\DateTimeInterface
    {
        return $this->datecom;
    }

    public function setDatecom(\DateTimeInterface $datecom): self
    {
        $this->datecom = $datecom;

        return $this;
    }

    /**
     * @return Collection<int, Detail>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(Detail $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details->add($detail);
            $detail->setNcom($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): self
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getNcom() === $this) {
                $detail->setNcom(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->ncom."-client ".$this->ncli;
    }

}
