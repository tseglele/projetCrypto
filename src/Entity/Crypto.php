<?php

namespace App\Entity;

use App\Repository\CryptoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CryptoRepository::class)]
class Crypto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 85)]
    private ?string $crypto_name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $symbole = null;

    #[ORM\OneToMany(mappedBy: 'crypto_id', targetEntity: CryptoRates::class)]
    private Collection $cryptoRates;

    public function __construct()
    {
        $this->cryptoRates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCryptoName(): ?string
    {
        return $this->crypto_name;
    }

    public function setCryptoName(string $crypto_name): static
    {
        $this->crypto_name = $crypto_name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSymbole(): ?string
    {
        return $this->symbole;
    }

    public function setSymbole(string $symbole): static
    {
        $this->symbole = $symbole;

        return $this;
    }

    /**
     * @return Collection<int, CryptoRates>
     */
    public function getCryptoRates(): Collection
    {
        return $this->cryptoRates;
    }

    public function addCryptoRate(CryptoRates $cryptoRate): static
    {
        if (!$this->cryptoRates->contains($cryptoRate)) {
            $this->cryptoRates->add($cryptoRate);
            $cryptoRate->setCryptoId($this);
        }

        return $this;
    }

    public function removeCryptoRate(CryptoRates $cryptoRate): static
    {
        if ($this->cryptoRates->removeElement($cryptoRate)) {
            // set the owning side to null (unless already changed)
            if ($cryptoRate->getCryptoId() === $this) {
                $cryptoRate->setCryptoId(null);
            }
        }

        return $this;
    }
}
