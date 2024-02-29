<?php

namespace App\Entity;

use App\Repository\CryptoRatesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CryptoRatesRepository::class)]
class CryptoRates
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cryptoRates')]
    private ?Crypto $crypto_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $rate_date = null;

    #[ORM\Column]
    private ?float $rate_value = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCryptoId(): ?Crypto
    {
        return $this->crypto_id;
    }

    public function setCryptoId(?Crypto $crypto_id): static
    {
        $this->crypto_id = $crypto_id;

        return $this;
    }

    public function getRateDate(): ?\DateTimeInterface
    {
        return $this->rate_date;
    }

    public function setRateDate(\DateTimeInterface $rate_date): static
    {
        $this->rate_date = $rate_date;

        return $this;
    }

    public function getRateValue(): ?float
    {
        return $this->rate_value;
    }

    public function setRateValue(float $rate_value): static
    {
        $this->rate_value = $rate_value;

        return $this;
    }
}
