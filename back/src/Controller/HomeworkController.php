<?php

namespace App\Controller;

use App\Entity\Homework;
use App\Form\DeleteType;
use App\Form\HomeworkType;
use App\Repository\HomeworkRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/homework", name="homework_")
 */
class HomeworkController extends AbstractController
{
    /**
     * @Route("/user/{user_id}/add", name="add", requirements={"user_id": "\d+"})
     */
    public function add($user_id, Request $request, UserRepository $userRepository)
    {
        $homework = new Homework();
        $user = $userRepository->find($user_id);

        $form = $this->createForm(HomeworkType::class, $homework);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $homework->setUser($user);

            foreach ($user->getRoles() as $role){
                if($role == "ROLE_STUDENT") {
                    $homework->setStatus(1);
                }
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($homework);
            $em->flush();
        }

        return $this->render('homework/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/user/{user_id}/edit/{id}", name="edit", requirements={"user_id": "\d+", "id": "\d+"})
     */
    public function edit($user_id, $id, Request $request, UserRepository $userRepository, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->find($id);
        $user = $userRepository->find($user_id);

        $form = $this->createForm(HomeworkType::class, $homework);

        $form->handleRequest($request);

        if($user->getId() == $homework->getUser()->getId()) {

            if($form->isSubmitted() && $form->isValid()) {

                // $homework->setUser($user);
                $homework->setUpdatedAt(new \DateTime());
    
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            }
        }

        $formDelete = $this->createForm(DeleteType::class, null, [
            'action' => $this->generateUrl('homework_delete', ['id' => $id])
        ]);

        return $this->render('homework/form.html.twig', [
            'form' => $form->createView(),
            'formDelete' => $formDelete->createView(),
        ]);
    }


    /**
     * @Route("/delete/{id}", name="delete", requirements={"id": "\d+"})
     */
    public function delete(Homework $homework, Request $request)
    {
        $formDelete = $this->createForm(DeleteType::class);
        $formDelete->handleRequest($request);

        if ($formDelete->isSubmitted() && $formDelete->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->remove($homework);
            $em->flush();
        }

        return $this->render('homework/form.html.twig', [
            'test'
        ]);
    }
}
