<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Expense
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'float')]
    private float $amount;

    #[ORM\Column(type: 'string')]
    private string $category;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $date;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private User $user;

    public function getId(): int { return $this->id; }
    public function getAmount(): float { return $this->amount; }
    public function setAmount(float $amount): void { $this->amount = $amount; }
    public function getCategory(): string { return $this->category; }
    public function setCategory(string $category): void { $this->category = $category; }
    public function getDate(): \DateTimeInterface { return $this->date; }
    public function setDate(\DateTimeInterface $date): void { $this->date = $date; }
    public function getUser(): User { return $this->user; }
    public function setUser(User $user): void { $this->user = $user; }
}
