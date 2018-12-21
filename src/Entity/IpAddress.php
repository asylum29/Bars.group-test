<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IpAddressRepository")
 */
class IpAddress
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $ip;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $countryCode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $countryRus;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $regionRus;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $cityRus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $zipCode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $timeZone;

    /**
     * @ORM\Column(type="integer")
     */
    private $timeModified;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountryRus(): ?string
    {
        return $this->countryRus;
    }

    public function setCountryRus(?string $countryRus): self
    {
        $this->countryRus = $countryRus;

        return $this;
    }

    public function getRegionRus(): ?string
    {
        return $this->regionRus;
    }

    public function setRegionRus(?string $regionRus): self
    {
        $this->regionRus = $regionRus;

        return $this;
    }

    public function getCityRus(): ?string
    {
        return $this->cityRus;
    }

    public function setCityRus(?string $cityRus): self
    {
        $this->cityRus = $cityRus;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getTimeZone(): ?string
    {
        return $this->timeZone;
    }

    public function setTimeZone(?string $timeZone): self
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    public function getTimeModified(): ?int
    {
        return $this->timeModified;
    }

    public function setTimeModified(int $timeModified): self
    {
        $this->timeModified = $timeModified;

        return $this;
    }
}
