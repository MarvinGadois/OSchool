<?php

namespace App\Controller\Api\V1\Secured;

use App\Repository\HomeworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/secured/v1/homework", name="api_secured_v1_homework_")
 */
class HomeworkController extends AbstractController
{
    /**
     * @Route("/", name="browse")
     */
    public function browse(SerializerInterface $serializer, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getHomework();

        $array = $serializer->normalize(
            $homework, 
            null, 
            ['groups' => 
                [
                    'homework', 
                    'homework_classroom', 'infos_classroom', 'school_classroom', 'school',
                    'homework_grade', 'grade',
                    'homework_user', 'infos_user', 'infos_subject'
                ],
            ]
        );

        return $this->json($array);
    }


    /**
     * @Route("/classroom/{id}", name="browseByClass")
     */
    public function browseByClass($id, SerializerInterface $serializer, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getHomeworkByClassroom($id);

        $array = $serializer->normalize(
            $homework, 
            null, 
            ['groups' => 
                [
                    'homework', 
                    'homework_classroom', 'infos_classroom', 'school_classroom', 'school',
                    'homework_grade', 'grade',
                    'homework_user', 'infos_user', 'infos_subject'
                ],
            ]
        );

        return $this->json($array);
    }


    /**
     * @Route("/subject/{id}", name="browseByClass")
     */
    public function browseBySubject($id, SerializerInterface $serializer, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getHomeworkBySubject($id);

        $array = $serializer->normalize(
            $homework, 
            null, 
            ['groups' => 
                [
                    'homework', 
                    'homework_classroom', 'infos_classroom', 'school_classroom', 'school',
                    'homework_grade', 'grade',
                    'homework_user', 'infos_user', 'infos_subject'
                ],
            ]
        );

        return $this->json($array);
    }
}
