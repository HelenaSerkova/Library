<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $edition = null;

    #[ORM\Column]
    private ?int $amount = null;

    #[ORM\Column(nullable: true)]
    private ?int $onarms = null;

    #[ORM\Column(nullable: true)]
    private ?int $inholl = null;

    #[ORM\OneToMany(mappedBy: 'idbooks', targetEntity: IssuedBooks::class)]
    private Collection $issuedBooks;

    public function __construct()
    {
        $this->issuedBooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
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

    public function getEdition(): ?string
    {
        return $this->edition;
    }

    public function setEdition(string $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getOnarms(): ?int
    {
        return $this->onarms;
    }

    public function setOnarms(?int $onarms): self
    {
        $this->onarms = $onarms;

        return $this;
    }

    public function getInholl(): ?int
    {
        return $this->inholl;
    }

    public function setInholl(?int $inholl): self
    {
        $this->inholl = $inholl;

        return $this;
    }

    /**
     * @return Collection<int, IssuedBooks>
     */
    public function getIssuedBooks(): Collection
    {
        return $this->issuedBooks;
    }

    public function addIssuedBook(IssuedBooks $issuedBook): self
    {
        if (!$this->issuedBooks->contains($issuedBook)) {
            $this->issuedBooks->add($issuedBook);
            $issuedBook->setIdbooks($this);
        }

        return $this;
    }

    public function removeIssuedBook(IssuedBooks $issuedBook): self
    {
        if ($this->issuedBooks->removeElement($issuedBook)) {
            // set the owning side to null (unless already changed)
            if ($issuedBook->getIdbooks() === $this) {
                $issuedBook->setIdbooks(null);
            }
        }

        return $this;
    }
}
