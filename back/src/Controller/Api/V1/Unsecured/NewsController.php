<?php

namespace App\Controller\Api\V1\Unsecured;

use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/unsecured/v1/news", name="api_secured_v1_news_")
 */
class NewsController extends AbstractController
{
    /**
     * @Route("/", name="browseBySchool")
     */
    public function browseBySchool(SerializerInterface $serializer, NewsRepository $newsRepository)
    {
        $news = $newsRepository->getNewsBySchool(2);

        // On demande au Serializer de normaliser nos films (transformer nos objets en array)
        // De plus, on lui spécifie qu'on veut normaliser selon les groupes "news" et "school"
        $array = $serializer->normalize($news, null, ['groups' => ['news', 'school']]);

        // La méthode json() retourne un objet JsonResponse qui est un objet Response particulier
        return $this->json($array);
    }


    /**
     * @Route("/{id}", name="read")
     */
    public function read($id, SerializerInterface $serializer, NewsRepository $newsRepository)
    {
        $news = $newsRepository->getNew($id);

        if($news->getSchool()->getId() == 2) {
            // On demande au Serializer de normaliser nos films (transformer nos objets en array)
            // De plus, on lui spécifie qu'on veut normaliser selon les groupes "news" et "school"
            $array = $serializer->normalize($news, null, ['groups' => ['news', 'school']]);

            // La méthode json() retourne un objet JsonResponse qui est un objet Response particulier
            return $this->json($array);
        }

        return $this->json([], 401);
    }
}
