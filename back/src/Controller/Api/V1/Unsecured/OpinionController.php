<?php

namespace App\Controller\Api\V1\Unsecured;

use App\Entity\Opinion;
use App\Repository\OpinionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/unsecured/v1/opinion", name="api_unsecured_v1_opinion_")
 */
class OpinionController extends AbstractController
{
    /**
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(OpinionRepository $opinionRepository, SerializerInterface $serializer)
    {
        $opinions = $opinionRepository->getOpinionsWithRelations();
        // $arrayMovies = $serializer->serialize($opinions, null, ['groups' => 'opinion_browse']);

        $json = $serializer->normalize(
            $opinions,
            'json', ['groups' => ['opinion_browse']]
        );
        return $this->json($json);
    }
}
