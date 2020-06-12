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

        if($user->getRoles()[0] != "ROLE_TEACHER") {
            $this->addFlash('warning', 'Vous ne pouvez pas accéder à cette page. Seuls les professeurs peuvent ajouter des leçons.');
        } else {

            if($form->isSubmitted() && $form->isValid()) {

                $lesson->setUser($user);

                // get the file to save
                $pathFile = $form->get('path')->getData();

                if($pathFile) {

                    // new file name
                    $pathName = $pathFile->getClientOriginalName();

                    // new file directory
                    $pathDirectory = __DIR__ . '/../../public/assets/lessons/';

                    //move the file to save to the new directory
                    $pathFile->move($pathDirectory, $pathName);
                }

            
                $em = $this->getDoctrine()->getManager();
                $em->persist($lesson);
                $em->flush();

                $this->addFlash('success', 'Leçon ajoutée avec succès.');

            }
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

        if($user->getRoles()[0] != "ROLE_TEACHER") {
            $this->addFlash('warning', 'Vous ne pouvez pas accéder à cette page. Seuls les professeurs peuvent modifier des leçons.');
        } else {

            if ($lesson) {
                if ($user->getId() == $lesson->getUser()->getId()) {
                    if ($form->isSubmitted() && $form->isValid()) {
                        $lesson->setUpdatedAt(new \DateTime());

                        // get the file to save
                        $pathFile = $form->get('path')->getData();

                        if($pathFile) {

                            // new file name
                            $pathName = $pathFile->getClientOriginalName();

                            // new file directory
                            $pathDirectory = __DIR__ . '/../../public/assets/lessons/';

                            //move the file to save to the new directory
                            $pathFile->move($pathDirectory, $pathName);
                        }

                        $em = $this->getDoctrine()->getManager();
                        $em->persist($lesson);
                        $em->flush();

                        $this->addFlash('success', 'Leçon modifiée avec succès.');

                    }
                    
                } else {
                    $this->addFlash('warning', 'Vous ne pouvez pas modifier cette leçon. Seul le propriétaire de la leçon peut la modifier.');
                }
            } else {
                $this->addFlash('danger', 'Cette leçon n\'existe pas.');
            }
        }

        

        $formDelete = $this->createForm(DeleteType::class, null, [
            'action' => $this->generateUrl('lesson_delete', ['user_id' => $user_id, 'id' => $id])
        ]);

        return $this->render('lesson/form.html.twig', [
            'form' => $form->createView(),
            'formDelete' => $formDelete->createView(),
        ]);
    }


    /**
     * @Route("/user/{user_id}/delete/{id}", name="delete", requirements={"user_id": "\d+","id": "\d+"})
     */
    public function delete($user_id, Lesson $lesson, Request $request, UserRepository $userRepository)
    {
        $formDelete = $this->createForm(DeleteType::class);
        $formDelete->handleRequest($request);
        $user = $userRepository->find($user_id);

        if($user->getRoles()[0] != "ROLE_TEACHER") {
            $this->addFlash('warning', 'Vous ne pouvez pas accéder à cette page. Seuls les professeurs peuvent supprimer des leçons.');
        } else {

            if ($lesson) {
                if ($user->getId() == $lesson->getUser()->getId()) {
                    if ($formDelete->isSubmitted() && $formDelete->isValid()) {
                        $em = $this->getDoctrine()->getManager();
                        $em->remove($lesson);
                        $em->flush();

                        $this->addFlash('success', 'Leçon supprimée avec succès.');

                    }

                } else {
                    $this->addFlash('warning', 'Vous ne pouvez pas supprimer cette leçon. Seul le propriétaire de la leçon peut la supprimer.');
                }
            } else {
                $this->addFlash('danger', 'Cette leçon n\'existe pas.');
            }
        }

        return $this->render('lesson/form.html.twig', [
            'test'
        ]);
    }
}
