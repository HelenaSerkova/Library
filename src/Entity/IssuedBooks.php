<?php

namespace App\Entity;

use App\Repository\IssuedBooksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IssuedBooksRepository::class)]
class IssuedBooks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $issued_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $return_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $validity = null;

    #[ORM\ManyToOne(inversedBy: 'issuedBooks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Book $idbooks = null;

    #[ORM\ManyToOne(inversedBy: 'issuedBooks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reader $idreaders = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIssuedDate(): ?\DateTimeInterface
    {
        return $this->issued_date;
    }

    public function setIssuedDate(\DateTimeInterface $issued_date): self
    {
        $this->issued_date = $issued_date;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->return_date;
    }

    public function setReturnDate(?\DateTimeInterface $return_date): self
    {
        $this->return_date = $return_date;

        return $this;
    }

    public function getValidity(): ?\DateTimeInterface
    {
        return $this->validity;
    }

    public function setValidity(\DateTimeInterface $validity): self
    {
        $this->validity = $validity;

        return $this;
    }

    public function getIdbooks(): ?Book
    {
        return $this->idbooks;
    }

    public function setIdbooks(?Book $idbooks): self
    {
        $this->idbooks = $idbooks;

        return $this;
    }

    public function getIdreaders(): ?Reader
    {
        return $this->idreaders;
    }

    public function setIdreaders(?Reader $idreaders): self
    {
        $this->idreaders = $idreaders;

        return $this;
    }
}
