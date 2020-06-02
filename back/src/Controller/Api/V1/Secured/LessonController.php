<?php

namespace App\Controller\Api\V1\Secured;

use App\Repository\LessonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/secured/v1/lessons", name="api_secured_v1_lessons_")
 */
class LessonController extends AbstractController
{
    /**
     * @Route("/", name="browse")
     */
    public function browse(SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLessons();

        $array = $serializer->normalize($lessons, null, ['groups' => ['lessons', 'infos_classroom', 'school', 'infos_user', 'infos_subject']]);

        return $this->json($array);
    }
}
