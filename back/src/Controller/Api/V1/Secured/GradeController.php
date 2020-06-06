<?php

namespace App\Controller\Api\V1\Secured;

use App\Entity\Grade;
use App\Repository\GradeRepository;
use App\Repository\HomeworkRepository;
use App\Services\Render;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api/secured/v1/grade", name="api_secured_v1_grade_")
 */
class GradeController extends AbstractController
{
    private $group;
    private $render;

    public function __construct(Render $render)
    {
        $this->group = 
            [
                'grade',
                'grade_homework', 'homework', 'homework_user', 'infos_user', 'homework_classroom', 'infos_classroom'
            ];

        $this->render = $render;
    }


    /**
     * @Route("/{id}", name="read", requirements={"id": "\d+"})
     */
    public function read($id, GradeRepository $gradeRepository)
    {
        $grade = $gradeRepository->getOneGrade($id);
        return $this->json($this->render->normalizeByGroup($grade, $this->group));
    }


    /**
     * @Route("/", name="browse")
     */
    public function browse(GradeRepository $gradeRepository)
    {
        $grade = $gradeRepository->getGrade();
        return $this->json($this->render->normalizeByGroup($grade, $this->group));
    }


    /**
     * @Route("/classroom/{id}", name="browseByClass", requirements={"id": "\d+"})
     */
    public function browseByClass($id, GradeRepository $gradeRepository)
    {
        $grade = $gradeRepository->getGradeByClassroom($id);
        return $this->json($this->render->normalizeByGroup($grade, $this->group));
    }


    /**
     * @Route("/subject/{id}", name="browseBySubject", requirements={"id": "\d+"})
     */
    public function browseBySubject($id, GradeRepository $gradeRepository)
    {
        $grade = $gradeRepository->getGradeBySubject($id);
        return $this->json($this->render->normalizeByGroup($grade, $this->group));
    }

    /**
     * @Route("/classroom/{class_id}/subject/{sub_id}", name="browseByClassAndSubject", requirements={"class_id": "\d+", "sub_id": "\d+"})
     */
    public function browseByClassAndSubject($class_id, $sub_id, GradeRepository $gradeRepository)
    {
        $grade = $gradeRepository->getGradeByClassroomAndSubject($class_id, $sub_id);
        return $this->json($this->render->normalizeByGroup($grade, $this->group));
    }


    /**
     * @Route("/user/{id}", name="browseByUser", requirements={"id": "\d+"})
     */
    public function browseByUser($id, GradeRepository $gradeRepository)
    {
        $grade = $gradeRepository->getGradeByUser($id);
        return $this->json($this->render->normalizeByGroup($grade, $this->group));
    }


    /**
     * @Route("/classroom/{class_id}/user/{user_id}", name="browseByClassAndUser", requirements={"class_id": "\d+", "user_id": "\d+"})
     */
    public function browseByClassAndUser($class_id, $user_id, GradeRepository $gradeRepository)
    {
        $grade = $gradeRepository->getGradeByClassroomAndUser($class_id, $user_id);
        return $this->json($this->render->normalizeByGroup($grade, $this->group));
    }


    /**
     * @Route("/subject/{sub_id}/user/{user_id}", name="browseBySubjectAndUser", requirements={"sub_id": "\d+", "user_id": "\d+"})
     */
    public function browseBySubjectAndUser($sub_id, $user_id, GradeRepository $gradeRepository)
    {
        $grade = $gradeRepository->getGradeBySubjectAndUser($sub_id, $user_id);
        return $this->json($this->render->normalizeByGroup($grade, $this->group));
    }


    /**
     * @Route("/classroom/{class_id}/subject/{sub_id}/user/{user_id}", name="browseByClassAndSubjectAndUser", requirements={"class_id": "\d+", "sub_id": "\d+", "user_id": "\d+"})
     */
    public function browseByClassAndSubjectAndUser($class_id, $sub_id, $user_id, GradeRepository $gradeRepository)
    {
        $grade = $gradeRepository->getGradeByClassAndSubjectAndUser($class_id, $sub_id, $user_id);
        return $this->json($this->render->normalizeByGroup($grade, $this->group));
    }


    /**
     * @Route("/add", name="add", methods={"POST"})
     */
    public function add(Request $request, HomeworkRepository $homeworkRepository)
    {
        $jsonData = json_decode($request->getContent());
        $homework = $homeworkRepository->getOneHomework($jsonData->homework);

        $grade = new Grade();

        $grade->setTitle($jsonData->title);
        $grade->setGrade($jsonData->grade);
        $grade->setContent($jsonData->content);

        $grade->setHomework($homework);

        $em = $this->getDoctrine()->getManager();
        $em->persist($grade);
        $em->flush();

        return $this->json($this->render->normalizeByGroup($grade, $this->group), 201);
    }
}
