<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $GroupName = null;

    #[ORM\Column(length: 255)]
    private ?string $Style = null;

    #[ORM\Column]
    private ?int $Year = null;

    #[ORM\Column(length: 255)]
    private ?string $Medium = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Owner = null;

    #[ORM\ManyToOne]
    private ?User $Borrower = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getGroupName(): ?string
    {
        return $this->GroupName;
    }

    public function setGroupName(string $GroupName): static
    {
        $this->GroupName = $GroupName;

        return $this;
    }

    public function getStyle(): ?string
    {
        return $this->Style;
    }

    public function setStyle(string $Style): static
    {
        $this->Style = $Style;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->Year;
    }

    public function setYear(int $Year): static
    {
        $this->Year = $Year;

        return $this;
    }

    public function getMedium(): ?string
    {
        return $this->Medium;
    }

    public function setMedium(string $Medium): static
    {
        $this->Medium = $Medium;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->Owner;
    }

    public function setOwner(?User $Owner): static
    {
        $this->Owner = $Owner;

        return $this;
    }

    public function getBorrower(): ?User
    {
        return $this->Borrower;
    }

    public function setBorrower(?User $Borrower): static
    {
        $this->Borrower = $Borrower;

        return $this;
    }

}