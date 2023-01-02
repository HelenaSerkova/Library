<?php

namespace App\Entity;

use App\Repository\ReaderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReaderRepository::class)]
class Reader
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column]
    private ?int $passport = null;

    #[ORM\Column(length: 15)]
    private ?string $telephone = null;

    #[ORM\Column(nullable: true)]
    private ?int $score = null;

    #[ORM\OneToMany(mappedBy: 'idreaders', targetEntity: IssuedBooks::class)]
    private Collection $issuedBooks;

    public function __construct()
    {
        $this->issuedBooks = new ArrayCollection();
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

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getPassport(): ?int
    {
        return $this->passport;
    }

    public function setPassport(int $passport): self
    {
        $this->passport = $passport;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

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
            $issuedBook->setIdreaders($this);
        }

        return $this;
    }

    public function removeIssuedBook(IssuedBooks $issuedBook): self
    {
        if ($this->issuedBooks->removeElement($issuedBook)) {
            // set the owning side to null (unless already changed)
            if ($issuedBook->getIdreaders() === $this) {
                $issuedBook->setIdreaders(null);
            }
        }

        return $this;
    }
}
