<?php

namespace App\Controller;

use App\Entity\IpAddress;
use App\Services\IpDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/api/ip")
 */
class IpController extends AbstractController
{
    private $ipDataService;
    private $serializer;

    public function __construct(IpDataService $ipDataService)
    {
        $this->ipDataService = $ipDataService;
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/addresses", name="ip.addresses")
     */
    public function getAddresses()
    {
        $repository = $this->getDoctrine()->getRepository(IpAddress::class);
        $ip_variants = $repository->findAllIps();
        return $this->jsonObjectResponse($ip_variants);
    }

    /**
     * @Route("/get", name="ip.get")
     */
    public function getIpInfo(Request $request)
    {
        $ip = $request->get('ip', null);
        if ($ip === null) {
            return $this->json([
                'error' => 'Ip not found'
            ]);
        }

        $ipAddress = $this->ipDataService->getData($ip);
        if ($ipAddress === null) {
            return $this->json([
                'error' => 'Ip not found'
            ]);
        }

        return $this->jsonObjectResponse($ipAddress);
    }

    /**
     * @Route("/stored", name="ip.stored")
     */
    public function getStored()
    {
        $repository = $this->getDoctrine()->getRepository(IpAddress::class);
        return $this->jsonObjectResponse($repository->findAll());
    }

    private function jsonObjectResponse($object) : JsonResponse
    {
        $jsonContent = $this->serializer->serialize($object, 'json');
        return new JsonResponse($jsonContent, 200, array(), true);
    }
}
