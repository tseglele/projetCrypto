<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 85)]
    private ?string $trans_type = null;

    #[ORM\Column]
    private ?float $trans_amount = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $trans_date = null;

    #[ORM\ManyToOne]
    private ?Wallet $wallet_id = null;

    #[ORM\Column]
    private ?float $trans_price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransType(): ?string
    {
        return $this->trans_type;
    }

    public function setTransType(string $trans_type): static
    {
        $this->trans_type = $trans_type;

        return $this;
    }

    public function getTransAmount(): ?float
    {
        return $this->trans_amount;
    }

    public function setTransAmount(float $trans_amount): static
    {
        $this->trans_amount = $trans_amount;

        return $this;
    }

    public function getTransDate(): ?\DateTimeInterface
    {
        return $this->trans_date;
    }

    public function setTransDate(\DateTimeInterface $trans_date): static
    {
        $this->trans_date = $trans_date;

        return $this;
    }

    public function getWalletId(): ?Wallet
    {
        return $this->wallet_id;
    }

    public function setWalletId(?Wallet $wallet_id): static
    {
        $this->wallet_id = $wallet_id;

        return $this;
    }

    public function getTransPrice(): ?float
    {
        return $this->trans_price;
    }

    public function setTransPrice(float $trans_price): static
    {
        $this->trans_price = $trans_price;

        return $this;
    }
}
