<?php

namespace App\Controller\Api\V1\Secured;

use App\Entity\Homework;
use App\Repository\ClassroomRepository;
use App\Repository\HomeworkRepository;
use App\Repository\SubjectRepository;
use App\Repository\UserRepository;
use App\Services\Render;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/secured/v1/homework", name="api_secured_v1_homework_")
 */
class HomeworkController extends AbstractController
{
    private $group;
    private $render;

    public function __construct(Render $render)
    {
        $this->group = [
            'homework', 
            'homework_classroom', 'infos_classroom', 'school_classroom', 'school',
            'homework_grade', 'grade',
            'homework_user', 'infos_user',
            'homework_subject', 'infos_subject'
        ];

        $this->render = $render;
    }


    /**
     * @Route("/{id}", name="read", requirements={"id": "\d+"})
     */
    public function read($id, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getOneHomework($id);
        return $this->json($this->render->normalizeByGroup($homework, $this->group));
    }


    /**
     * @Route("/", name="browse")
     */
    public function browse(HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getHomework();
        return $this->json($this->render->normalizeByGroup($homework, $this->group));
    }


    /**
     * @Route("/classroom/{id}", name="browseByClass", requirements={"id": "\d+"})
     */
    public function browseByClass($id, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getHomeworkByClassroom($id);
        return $this->json($this->render->normalizeByGroup($homework, $this->group));
    }


    /**
     * @Route("/subject/{id}", name="browseBySubject", requirements={"id": "\d+"})
     */
    public function browseBySubject($id, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getHomeworkBySubject($id);
        return $this->json($this->render->normalizeByGroup($homework, $this->group));
    }

    /**
     * @Route("/classroom/{class_id}/subject/{sub_id}", name="browseByClassAndSubject", requirements={"class_id": "\d+", "sub_id": "\d+"})
     */
    public function browseByClassAndSubject($class_id, $sub_id, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getHomeworkByClassroomAndSubject($class_id, $sub_id);
        return $this->json($this->render->normalizeByGroup($homework, $this->group));
    }


    /**
     * @Route("/user/{id}", name="browseByUser", requirements={"id": "\d+"})
     */
    public function browseByUser($id,HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getHomeworkByUser($id);
        return $this->json($this->render->normalizeByGroup($homework, $this->group));
    }


    /**
     * @Route("/classroom/{class_id}/user/{user_id}", name="browseByClassAndUser", requirements={"class_id": "\d+", "user_id": "\d+"})
     */
    public function browseByClassAndUser($class_id, $user_id, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getHomeworkByClassroomAndUser($class_id, $user_id);
        return $this->json($this->render->normalizeByGroup($homework, $this->group));
    }


    /**
     * @Route("/subject/{sub_id}/user/{user_id}", name="browseBySubjectAndUser", requirements={"sub_id": "\d+", "user_id": "\d+"})
     */
    public function browseBySubjectAndUser($sub_id, $user_id, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getHomeworkBySubjectAndUser($sub_id, $user_id);
        return $this->json($this->render->normalizeByGroup($homework, $this->group));
    }


    /**
     * @Route("/classroom/{class_id}/subject/{sub_id}/user/{user_id}", name="browseByClassAndSubjectAndUser", requirements={"class_id": "\d+", "sub_id": "\d+", "user_id": "\d+"})
     */
    public function browseByClassAndSubjectAndUser($class_id, $sub_id, $user_id, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->getHomeworkByClassAndSubjectAndUser($class_id, $sub_id, $user_id);
        return $this->json($this->render->normalizeByGroup($homework, $this->group));
    }


    /**
     * @Route("/add", name="add", methods={"POST"})
     */
    public function add(Request $request, ClassroomRepository $classroomRepository, UserRepository $userRepository, SubjectRepository $subjectRepository)
    {

        $jsonData = json_decode($request->getContent());
        $classroom = $classroomRepository->find($jsonData->classroom);
        $user = $userRepository->find($jsonData->user);
        $subject = $subjectRepository->find($jsonData->subject);

        $homework = new Homework(); // on instencie la class/entity homework

        $homework->setTitle($jsonData->title);
        $homework->setContent($jsonData->content);
        $homework->setPath($jsonData->path);
        $homework->setCode($jsonData->code);

        $homework->setClassroom($classroom);
        $homework->setUser($user);
        $homework->setSubject($subject);

        // On periste
        $em = $this->getDoctrine()->getManager();
        $em->persist($homework);
        $em->flush();

        return $this->json($this->render->normalizeByGroup($homework, $this->group), 201);
    }
}
