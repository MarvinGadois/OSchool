<?php

namespace App\Controller;

use App\Entity\Ressource;
use App\Form\DeleteType;
use App\Form\RessourceType;
use App\Repository\RessourceRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ressource", name="ressource_")
 */
class RessourceController extends AbstractController
{
    /**
     * @Route("/user/{user_id}/add", name="add", requirements={"user_id": "\d+"})
     */
    public function add($user_id, Request $request, UserRepository $userRepository)
    {
        $ressource = new Ressource();
        $user = $userRepository->find($user_id);

        $form = $this->createForm(RessourceType::class, $ressource);

        $form->handleRequest($request);

        if($user->getRoles()[0] != "ROLE_TEACHER") {
            dd("nop");
        } else {
            if($form->isSubmitted() && $form->isValid()) {
            
                $ressource->setUser($user);
    
                $em = $this->getDoctrine()->getManager();
                $em->persist($ressource);
                $em->flush();
            }
        }

        return $this->render('ressource/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/{user_id}/edit/{id}", name="edit", requirements={"user_id": "\d+", "id": "\d+"})
     */
    public function edit($id, $user_id, Request $request, UserRepository $userRepository, RessourceRepository $ressourceRepository)
    {
        $ressource = $ressourceRepository->find($id);
        $user = $userRepository->find($user_id);

        $form = $this->createForm(RessourceType::class, $ressource);

        $form->handleRequest($request);

        if($user->getRoles()[0] != "ROLE_TEACHER") {
            dd("nop");
        } else {

            if($ressource) {
                if ($user->getId() == $ressource->getUser()->getId()) {
                    if ($form->isSubmitted() && $form->isValid()) {
                        $ressource->setUpdatedAt(new \DateTime());
                        $em = $this->getDoctrine()->getManager();
                        $em->flush();
                    }
                } else {
                    dd("nop");
                }
            } else {
                dd("nopnop");
            }
        }

        $formDelete = $this->createForm(DeleteType::class, null, [
            'action' => $this->generateUrl('ressource_delete', ['user_id' => $user_id, 'id' => $id])
        ]);

        return $this->render('ressource/form.html.twig', [
            'form' => $form->createView(),
            'formDelete' => $formDelete->createView(),
        ]);
    }

    /**
     * @Route("/user/{user_id}/delete/{id}", name="delete", requirements={"user_id": "\d+", "id": "\d+"})
     */
    public function delete($user_id, Ressource $ressource, Request $request, UserRepository $userRepository)
    {
        $formDelete = $this->createForm(DeleteType::class);
        $formDelete->handleRequest($request);
        $user = $userRepository->find($user_id);

        if($user->getRoles()[0] != "ROLE_TEACHER") {
            dd("nop");
        } else {

            if ($ressource) {
                if ($user->getId() == $ressource->getUser()->getId()) {
                    if ($formDelete->isSubmitted() && $formDelete->isValid()) {
                        $em = $this->getDoctrine()->getManager();
                        $em->remove($ressource);
                        $em->flush();
                    }
                }
            }
        }

        return $this->render('ressource/form.html.twig', [
            'test'
        ]);
    }
}
