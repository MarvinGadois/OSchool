<?php

namespace App\Controller\Api\V1\Secured;

use App\Repository\RessourceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/secured/v1/ressources", name="api_secured_v1_ressources_")
 */
class RessourcesController extends AbstractController
{
    /**
     * @Route("/", name="browse")
     */
    public function browse(SerializerInterface $serializer, RessourceRepository $ressourceRepository)
    {
        $ressources = $ressourceRepository->getRessources();

        $array = $serializer->normalize($ressources, null, ['groups' => ['ressource', 'classroom']]);

        return $this->json($array);
    }

    public function browseByClassroom($id, SerializerInterface $serializer, RessourceRepository $ressourceRepository)
    {
        $ressources = $ressourceRepository->getRessourcesByClassroom($id);

        $array = $serializer->normalize($ressources, null, ['groups' => ['ressource', 'classroom']]);

        return $this->json($array);
    }

    public function read($id, SerializerInterface $serializer, RessourceRepository $ressourceRepository)
    {
        $ressources = $ressourceRepository->getRessource($id);

        $array = $serializer->normalize($ressources, null, ['groups' => ['ressource', 'classroom']]);

        return $this->json($array);
    }
}
