<?php

namespace App\Controller;

use App\Entity\Homework;
use App\Form\CorrectionHomeworkType;
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

            if ($form->isSubmitted() && $form->isValid()) {
                $homework->setUser($user);

                if ($user->getRoles()[0] == "ROLE_STUDENT") {
                    $homework->setStatus(1);
                }

                // get the file to save
                $pathFile = $form->get('path')->getData();

                if($pathFile) {

                    // new file name
                    $pathName = $pathFile->getClientOriginalName();

                    // new file directory
                    $pathDirectory = __DIR__ . '/../../public/assets/homework/';

                    //move the file to save to the new directory
                    $pathFile->move($pathDirectory, $pathName);
                }

                $em = $this->getDoctrine()->getManager();
                $em->persist($homework);
                $em->flush();

                $this->addFlash('success', 'Devoir ajouté avec succès.');

            }

        return $this->render('homework/form.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
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

        if ($homework) {
            if ($user->getId() == $homework->getUser()->getId()) {
                if ($form->isSubmitted() && $form->isValid()) {

                    // $homework->setUser($user);
                    $homework->setUpdatedAt(new \DateTime());

                    // get the file to save
                    $pathFile = $form->get('path')->getData();

                    if($pathFile) {

                        // new file name
                        $pathName = $pathFile->getClientOriginalName();
    
                        // new file directory
                        $pathDirectory = __DIR__ . '/../../public/assets/homework/';
    
                        //move the file to save to the new directory
                        $pathFile->move($pathDirectory, $pathName);
                    }
    
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                
                    $this->addFlash('success', 'Devoir modifié avec succès.');

                }

            } else {
                $this->addFlash('warning', 'Vous ne pouvez pas modifier ce devoir. Seul le propriétaire du devoir peut le modifier.');
            }
        } else {
            $this->addFlash('error', 'Ce devoir n\'existe pas.');
        }

        $formDelete = $this->createForm(DeleteType::class, null, [
            'action' => $this->generateUrl('homework_delete', ['user_id' => $user_id, 'id' => $id])
        ]);

        return $this->render('homework/form.html.twig', [
            'form' => $form->createView(),
            'formDelete' => $formDelete->createView(),
            'user' => $user,
        ]);
    }


    /**
     * @Route("/user/{user_id}/correction/{id}", name="correction", requirements={"user_id": "\d+"})
     */
    public function correction($user_id, $id, Request $request, UserRepository $userRepository, HomeworkRepository $homeworkRepository)
    {
        $homework = $homeworkRepository->find($id);
        $user = $userRepository->find($user_id);

        $form = $this->createForm(CorrectionHomeworkType::class, $homework);

        $form->handleRequest($request);

        if($user->getRoles()[0] != "ROLE_TEACHER") {
            $this->addFlash('warning', 'Vous ne pouvez pas mettre de correction en ligne. Seuls les professeurs le peuvent.');
        } else {
                
            if ($form->isSubmitted() && $form->isValid()) {
                $homework->setStatus(2);
                $homework->setUpdatedAt(new \DateTime());

                // get the file to save
                $pathFile = $form->get('path')->getData();

                if($pathFile) {

                    // new file name
                    $pathName = $pathFile->getClientOriginalName();

                    // new file directory
                    $pathDirectory = __DIR__ . '/../../public/assets/homework/';

                    //move the file to save to the new directory
                    $pathFile->move($pathDirectory, $pathName);
                }
    
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            
                $this->addFlash('success', 'Correction ajoutée avec succès.');
            }
        }
        

        $formDelete = $this->createForm(DeleteType::class, null, [
            'action' => $this->generateUrl('homework_delete', ['user_id' => $user_id, 'id' => $id])
        ]);

        return $this->render('homework/form_correction.html.twig', [
            'form' => $form->createView(),
            'formDelete' => $formDelete->createView(),
            'user' => $user,
        ]);
    }



    /**
     * @Route("/user/{user_id}/delete/{id}", name="delete", requirements={"user_id": "\d+","id": "\d+"})
     */
    public function delete($user_id, Homework $homework, Request $request, UserRepository $userRepository)
    {
        $formDelete = $this->createForm(DeleteType::class);
        $formDelete->handleRequest($request);
        $user = $userRepository->find($user_id);

        if($user->getRoles()[0] != "ROLE_TEACHER") {
            $this->addFlash('warning', 'Vous ne pouvez pas supprimer un devoir. Seuls les professeurs le peuvent.');
        } else {

            if ($homework) {
                if ($user->getId() == $homework->getUser()->getId()) {
                    if ($formDelete->isSubmitted() && $formDelete->isValid()) {
                        $em = $this->getDoctrine()->getManager();
                        $em->remove($homework);
                        $em->flush();
                    
                        $this->addFlash('success', 'Devoir supprimé avec succès.');

                    }
                }
            } else {
                $this->addFlash('danger', 'Ce devoir n\'existe pas.');
            }
        }

        return $this->render('homework/form.html.twig', [
            'user' => $user,
        ]);
    }
}
