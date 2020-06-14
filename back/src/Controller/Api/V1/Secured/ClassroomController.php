<?php

namespace App\Controller\Api\V1\Secured;

use App\Repository\ClassroomRepository;
use App\Services\Render;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route ("/api/secured/v1/classroom", name="api_secured_v1_classroom_")
 */
class ClassroomController extends AbstractController
{
    private $group;
    private $render;

    public function __construct(Render $render)
    {
        $this->group = [
            'infos_classroom',
            'school_classroom', 'school',
            'schedules_classroom', 'schedule',
            'users_classroom', 'infos_user', 'user_subject', 'infos_subject'
        ];

        $this->render = $render;
    }


    /**
     * @Route("/{id}", name="read", requirements={"id": "\d+"})
     */
    public function read($id, ClassroomRepository $classroomRepository)
    {
        $classroom = $classroomRepository->getOneClassroom($id);
        return $this->json($this->render->normalizeByGroup($classroom, $this->group));
    }


    /**
     * @Route("/", name="browse")
     */
    public function browse(ClassroomRepository $classroomRepository)
    {
        $classroom = $classroomRepository->getClassroom();
        return $this->json($this->render->normalizeByGroup($classroom, $this->group));
    }


    /**
     * @Route("/school/{id}", name="browseBySchool", requirements={"id": "\d+"})
     */
    public function browseBySchool($id, ClassroomRepository $classroomRepository)
    {
        $classroom = $classroomRepository->getClassroomBySchool($id);
        return $this->json($this->render->normalizeByGroup($classroom, $this->group));
    }
}
