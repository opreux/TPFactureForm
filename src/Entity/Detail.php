<?php

namespace App\Entity;

use App\Repository\DetailRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Schema\Sequence;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\CascadingStrategy;

#[ORM\Entity(repositoryClass: DetailRepository::class)]
class Detail
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "SEQUENCE")]
    #[ORM\SequenceGenerator(sequenceName:"commande_seq",initialValue:8)]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'details')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $ncom = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $npro = null;

    #[ORM\Column]
    private ?int $qcom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNcom(): ?Commande
    {
        return $this->ncom;
    }

    public function setNcom(?Commande $ncom): self
    {
        $this->ncom = $ncom;

        return $this;
    }

    public function getNpro(): ?Produit
    {
        return $this->npro;
    }

    public function setNpro(?Produit $npro): self
    {
        $this->npro = $npro;

        return $this;
    }

    public function getQcom(): ?int
    {
        return $this->qcom;
    }

    public function setQcom(int $qcom): self
    {
        $this->qcom = $qcom;

        return $this;
    }
}
