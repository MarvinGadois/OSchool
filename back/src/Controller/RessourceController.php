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

        if($form->isSubmitted() && $form->isValid()) {
            
            $ressource->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($ressource);
            $em->flush();
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

        $form = $this->createForm(RessourceType::class, $ressource);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $ressource->setUpdatedAt(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        }

        $formDelete = $this->createForm(DeleteType::class, null, [
            'action' => $this->generateUrl('ressource_delete', ['id' => $id])
        ]);

        return $this->render('ressource/form.html.twig', [
            'form' => $form->createView(),
            'formDelete' => $formDelete->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", requirements={"id": "\d+"})
     */
    public function delete(Ressource $ressource, Request $request)
    {
        $formDelete = $this->createForm(DeleteType::class);
        $formDelete->handleRequest($request);

        if ($formDelete->isSubmitted() && $formDelete->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->remove($ressource);
            $em->flush();
        }

        return $this->render('ressource/form.html.twig', [
            'test'
        ]);
    }
}
