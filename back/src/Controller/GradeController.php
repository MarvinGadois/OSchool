<?php

namespace App\Controller;

use App\Entity\Grade;
use App\Form\DeleteType;
use App\Form\GradeType;
use App\Repository\GradeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/grade", name="grade_")
 */
class GradeController extends AbstractController
{
    /**
     * @Route("/user/{user_id}/add", name="add", requirements={"user_id": "\d+"})
     */
    public function add($user_id, Request $request, UserRepository $userRepository)
    {
        $grade = new Grade();
        $user = $userRepository->find($user_id);

        $form = $this->createForm(GradeType::class, $grade);

        $form->handleRequest($request);

        if($user->getRoles()[0] != "ROLE_TEACHER") {
            $this->addFlash('warning', 'Vous ne pouvez pas mettre de notes en ligne. Seuls les professeurs le peuvent.');
        } else {

            if($form->isSubmitted() && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($grade);
                $em->flush();

                $this->addFlash('success', 'Note ajoutée avec succès.');

            }
        }

        return $this->render('grade/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/user/{user_id}/edit/{id}", name="edit", requirements={"user_id": "\d+"})
     */
    public function edit($user_id, $id, Request $request, UserRepository $userRepository, GradeRepository $gradeRepository)
    {
        $grade = $gradeRepository->find($id);
        $user = $userRepository->find($user_id);

        $form = $this->createForm(GradeType::class, $grade);

        $form->handleRequest($request);

        if($user->getRoles()[0] != "ROLE_TEACHER") {
            $this->addFlash('warning', 'Vous ne pouvez pas modifier de notes. Seuls les professeurs le peuvent.');
        } else {

            if($form->isSubmitted() && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->flush();

                $this->addFlash('success', 'Note modifiée avec succès.');

            }
        }

        $formDelete = $this->createForm(DeleteType::class, null, [
            'action' => $this->generateUrl('grade_delete', ['user_id' => $user_id, 'id' => $id])
        ]);

        return $this->render('grade/form.html.twig', [
            'form' => $form->createView(),
            'formDelete' => $formDelete->createView(),
        ]);
    }


    /**
     * @Route("/user/{user_id}/delete/{id}", name="delete", requirements={"user_id": "\d+","id": "\d+"})
     */
    public function delete($user_id, Grade $grade, Request $request, UserRepository $userRepository)
    {
        $formDelete = $this->createForm(DeleteType::class);
        $formDelete->handleRequest($request);
        $user = $userRepository->find($user_id);

        if($user->getRoles()[0] != "ROLE_TEACHER") {
            $this->addFlash('warning', 'Vous ne pouvez pas supprimer de notes. Seuls les professeurs le peuvent.');
        } else {

            if ($formDelete->isSubmitted() && $formDelete->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($grade);
                $em->flush();
                $this->addFlash('success', 'Note supprimée avec succès.');

            }
        }

        return $this->render('grade/form.html.twig', [
            'test'
        ]);
    }
}
