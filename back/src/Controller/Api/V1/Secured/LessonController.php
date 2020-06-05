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

        $array = $serializer->normalize($lessons, null, ['groups' => ['lessons', 'infos_classroom', 'school', 'infos_user', 'user_subject', 'infos_subject']]);

        return $this->json($array);
    }

    /**
     * @Route("/classroom/{id}", name="browseByClassroom", requirements={"id":"\d+"})
     */
    public function browseByClassroom($id, SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLessonsByClassroom($id);

        $array = $serializer->normalize($lessons, null, ['groups' => ['lessons', 'infos_classroom', 'school', 'infos_user','user_subject', 'infos_subject']]);

        return $this->json($array);
    }

    /**
     * @Route("/{id}", name="browseById", requirements={"id":"\d+"})
     */
    public function read($id, SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLesson($id);

        $array = $serializer->normalize($lessons, null, ['groups' => ['lessons', 'infos_classroom', 'school', 'infos_user','user_subject', 'infos_subject']]);

        return $this->json($array);
    }
}
