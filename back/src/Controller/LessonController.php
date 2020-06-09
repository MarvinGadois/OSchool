<?php

namespace App\Controller;

use App\Entity\Lesson;
use App\Form\DeleteType;
use App\Form\LessonType;
use App\Repository\LessonRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lesson", name="lesson_")
 */
class LessonController extends AbstractController
{
    /**
     * @Route("/user/{user_id}/add", name="add", requirements={"user_id": "\d+"})
     */
    public function add($user_id, Request $request, UserRepository $userRepository)
    {
        $lesson = new Lesson();
        $user = $userRepository->find($user_id);

        $form = $this->createForm(LessonType::class, $lesson);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $lesson->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($lesson);
            $em->flush();
        }

        return $this->render('lesson/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/user/{user_id}/edit/{id}", name="edit", requirements={"user_id": "\d+", "id": "\d+"})
     */
    public function edit($id, $user_id, Request $request, UserRepository $userRepository, LessonRepository $lessonRepository)
    {
        $lesson = $lessonRepository->find($id);
        $user = $userRepository->find($user_id);

        $form = $this->createForm(LessonType::class, $lesson);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $lesson->setUpdatedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->flush();
        }

        $formDelete = $this->createForm(DeleteType::class, null, [
            'action' => $this->generateUrl('lesson_delete', ['id' => $id])
        ]);

        return $this->render('lesson/form.html.twig', [
            'form' => $form->createView(),
            'formDelete' => $formDelete->createView(),
        ]);
    }


    /**
     * @Route("/delete/{id}", name="delete", requirements={"id": "\d+"})
     */
    public function delete(Lesson $lesson, Request $request)
    {
        $formDelete = $this->createForm(DeleteType::class);
        $formDelete->handleRequest($request);

        if ($formDelete->isSubmitted() && $formDelete->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->remove($lesson);
            $em->flush();
        }

        return $this->render('lesson/form.html.twig', [
            'test'
        ]);
    }
}
