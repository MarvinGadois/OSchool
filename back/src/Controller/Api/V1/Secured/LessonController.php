<?php

namespace App\Controller\Api\V1\Secured;

use App\Entity\Lesson;
use App\Repository\ClassroomRepository;
use App\Repository\LessonRepository;
use App\Repository\SubjectRepository;
use App\Repository\UserRepository;
use App\Services\Render;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/secured/v1/lessons", name="api_secured_v1_lessons_")
 */
class LessonController extends AbstractController
{
    private $group;
    private $render;

    public function __construct(Render $render)
    {
        $this->group = [
            'lessons',
            'infos_classroom',
            'school',
            'infos_user',
            'infos_subject',
            'lessons_subject'
        ];

        $this->render = $render;
    }

    /**
     * @Route("/", name="browse")
     */
    public function browse(SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLessons();

        return $this->json($this->render->normalizeByGroup($lessons, $this->group));
    }

    /**
     * @Route("/classroom/{id}", name="browseByClassroom", requirements={"id":"\d+"})
     */
    public function browseByClassroom($id, SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLessonsByClassroom($id);

        return $this->json($this->render->normalizeByGroup($lessons, $this->group));
    }

    /**
     * @Route("/subject/{id}", name="browseBySubject", requirements={"id":"\d+"})
     */
    public function browseBySubject($id, SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLessonsBySubject($id);

        return $this->json($this->render->normalizeByGroup($lessons, $this->group));
    }

    /**
     * @Route("/user/{id}", name="browseByUser", requirements={"id":"\d+"})
     */
    public function browseByUser($id, SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLessonsByUser($id);

        return $this->json($this->render->normalizeByGroup($lessons, $this->group));
    }

    /**
     * @Route("/subject/{sub_id}/user/{user_id}", name="browseBySubjectAndUser", requirements={"sub_id":"\d+", "user_id":"\d+"})
     */
    public function browseBySubjectAndUser($sub_id, $user_id, SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLessonsBySubjectAndUser($sub_id, $user_id);

        return $this->json($this->render->normalizeByGroup($lessons, $this->group));
    }

    /**
     * @Route("/classroom/{class_id}/user/{user_id}", name="browseByClassroomAndUser", requirements={"class_id":"\d+", "user_id":"\d+"})
     */
    public function browseByClassroomAndUser($class_id, $user_id, SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLessonsByClassroomAndUser($class_id, $user_id);

        return $this->json($this->render->normalizeByGroup($lessons, $this->group));
    }

    /**
     * @Route("/classroom/{class_id}/subject/{sub_id}", name="browseByClassroomAndSubject", requirements={"class_id":"\d+", "sub_id":"\d+"})
     */
    public function browseByClassroomAndSubject($class_id, $sub_id, SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLessonsByClassroomAndSubject($class_id, $sub_id);

        return $this->json($this->render->normalizeByGroup($lessons, $this->group));
    }

    /**
     * @Route("/classroom/{class_id}/subject/{sub_id}/user/{user_id}", name="browseByClassroomAndSubjectAndUser", requirements={"class_id":"\d+", "sub_id":"\d+", "user_id":"\d+"})
     */
    public function browseByClassroomAndSubjectAndUser($class_id, $sub_id, $user_id, SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLessonsByClassroomAndSubjectAndUser($class_id, $sub_id, $user_id);

        return $this->json($this->render->normalizeByGroup($lessons, $this->group));
    }

    /**
     * @Route("/{id}", name="browseById", requirements={"id":"\d+"})
     */
    public function read($id, SerializerInterface $serializer, LessonRepository $lessonRepository)
    {
        $lessons = $lessonRepository->getLesson($id);

        return $this->json($this->render->normalizeByGroup($lessons, $this->group));
    }

    /**
     * @Route("/add", name="add", methods={"POST"})
     */
    public function add(Request $request, ClassroomRepository $classroomRepository, UserRepository $userRepository, SubjectRepository $subjectRepository)
    {
        $jsonData = json_decode($request->getContent());
        $classroom = $classroomRepository->find($jsonData->classroom);
        $user = $userRepository->find($jsonData->user);
        $subjects = $subjectRepository->find($jsonData->subjects);

        $lesson = new Lesson();

        $lesson->setTitle($jsonData->title);
        $lesson->setContent($jsonData->content);
        $lesson->setPath($jsonData->path);
        $lesson->setClassroom($classroom);
        $lesson->setSubject($subjects);
        $lesson->setUser($user);

        $em = $this->getDoctrine()->getManager();
        $em->persist($lesson);
        $em->flush();

        return $this->json($this->render->normalizeByGroup($lesson, $this->group), 201);
    }
    
    /**
     * @Route("/edit/{id}", name="edit", methods={"PUT"}, requirements={"id": "\d+"})
     */
    public function edit($id, Request $request, LessonRepository $lessonRepository, ClassroomRepository $classroomRepository, UserRepository $userRepository, SubjectRepository $subjectRepository)
    {
        $jsonData = json_decode($request->getContent());
        $classroom = $classroomRepository->find($jsonData->classroom);
        $user = $userRepository->find($jsonData->user);
        $subject = $subjectRepository->find($jsonData->subject);

        $lesson = $lessonRepository->getLesson($id);

        if($lesson) {
            if($lesson->getId()) {
                $lesson->setTitle($jsonData->title);
                $lesson->setContent($jsonData->content);
                $lesson->setPath($jsonData->path);
                $lesson->setClassroom($classroom);
                $lesson->setSubject($subject);
                $lesson->setUser($user);

                $lesson->setUpdatedAt(new DateTime());

                $em = $this->getDoctrine()->getManager();
                $em->flush();

                return $this->json($this->render->normalizeByGroup($lesson, $this->group), 201);
            }

            return $this->json(["Cette leçon n'existe pas"], 404);
        }

        return $this->json(["Cette leçon n'existe pas"], 404);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"}, requirements={"id": "\d+"})
     */
    public function delete($id, LessonRepository $lessonRepository)
    {
        $lesson = $lessonRepository->getLesson($id);

        if($lesson) {
            if($lesson->getId()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($lesson);
                $em->flush();

                return $this->json(["Leçon supprimée"], 201);
            }

            return $this->json(["Cette leçon n'existe pas"], 404);
        }

        return $this->json(["Cette leçon n'existe pas"], 404);
    }
}
