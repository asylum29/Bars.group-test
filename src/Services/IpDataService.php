<?php

namespace App\Services;

use App\Entity\IpAddress;
use App\Repository\IpAddressRepository;
use Doctrine\ORM\EntityManagerInterface;

class IpDataService
{
    private $entityManager;
    private $ipAddressRepository;
    private $ipService;

    public function __construct(EntityManagerInterface $entityManager,
                                IpAddressRepository $ipAddressRepository,
                                IpService $ipService)
    {
        $this->entityManager = $entityManager;
        $this->ipAddressRepository = $ipAddressRepository;
        $this->ipService = $ipService;
    }

    public function getData(string $ip) : ?IpAddress
    {
        $ipAddress = $this->ipService->getInfo($ip);
        $ipStored = $this->ipAddressRepository->findOneBy(['ip' => $ip]);

        if ($ipAddress != null) {
            if ($ipStored != null) {
                $ipStored->setIp($ipAddress->getIp())
                    ->setCity($ipAddress->getCity())
                    ->setCityRus($ipAddress->getCityRus())
                    ->setCountry($ipAddress->getCountry())
                    ->setCountryRus($ipAddress->getCityRus())
                    ->setCountryCode($ipAddress->getCountryCode())
                    ->setRegion($ipAddress->getRegion())
                    ->setRegionRus($ipAddress->getRegionRus())
                    ->setLatitude($ipAddress->getLatitude())
                    ->setLongitude($ipAddress->getLongitude())
                    ->setZipCode($ipAddress->getZipCode())
                    ->setTimeZone($ipAddress->getTimeZone())
                    ->setTimeModified($ipAddress->getTimeModified());
                $ipAddress = $ipStored;
            }

            $this->entityManager->persist($ipAddress);
            $this->entityManager->flush();
        } else {
            $ipAddress = $ipStored;
        }

        return $ipAddress;
    }
}
