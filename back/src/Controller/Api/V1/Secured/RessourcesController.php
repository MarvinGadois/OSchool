<?php

namespace App\Controller\Api\V1\Secured;

use App\Entity\Ressource;
use App\Repository\ClassroomRepository;
use App\Repository\RessourceRepository;
use App\Repository\UserRepository;
use App\Services\Render;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/secured/v1/ressources", name="api_secured_v1_ressources_")
 */
class RessourcesController extends AbstractController
{
    private $group;
    private $render;

    public function __construct(Render $render)
    {
        $this->group = [
            'ressources',
            'infos_classroom',
            'school_classroom',
            'school',
            'infos_user',
            'user_subject',
            'infos_subject'
        ];

        $this->render = $render;
    }

    /**
     * @Route("/", name="browse")
     */
    public function browse(SerializerInterface $serializer, RessourceRepository $ressourceRepository)
    {
        $ressources = $ressourceRepository->getRessources();

        return $this->json($this->render->normalizeByGroup($ressources, $this->group));
    }

    /**
     * @Route("/classroom/{id}", name="browseByClassroom", requirements={"id":"\d+"})
     */
    public function browseByClassroom($id, SerializerInterface $serializer, RessourceRepository $ressourceRepository)
    {
        $ressources = $ressourceRepository->getRessourcesByClassroom($id);

        return $this->json($this->render->normalizeByGroup($ressources, $this->group));
    }

    /**
     * @Route("/user/{id}", name="browseByUser", requirements={"id":"\d+"})
     */
    public function browseByUser($id, SerializerInterface $serializer, RessourceRepository $ressourceRepository)
    {
        $ressources = $ressourceRepository->getRessourcesByUser($id);

        return $this->json($this->render->normalizeByGroup($ressources, $this->group));
    }

    /**
     * @Route("/classroom/{class_id}/user/{user_id}", name="browseByClassroomAndUser", requirements={"class_id":"\d+", "user_id":"\d+"})
     */
    public function browseByClassroomAndUser($class_id, $user_id, SerializerInterface $serializer, RessourceRepository $ressourceRepository)
    {
        $ressources = $ressourceRepository->getRessourcesByClassroomAndUser($class_id, $user_id);

        return $this->json($this->render->normalizeByGroup($ressources, $this->group));
    }

    /**
     * @Route("/{id}", name="browseById", requirements={"id":"\d+"})
     */
    public function read($id, SerializerInterface $serializer, RessourceRepository $ressourceRepository)
    {
        $ressources = $ressourceRepository->getRessource($id);

        return $this->json($this->render->normalizeByGroup($ressources, $this->group));
    }

    /**
     * @Route("/add", name="add", methods={"POST"})
     */
    public function add(Request $request, ClassroomRepository $classroomRepository, UserRepository $userRepository)
    {
        $jsonData = json_decode($request->getContent());
        $classroom = $classroomRepository->find($jsonData->classroom);
        $user = $userRepository->find($jsonData->user);

        $ressource = new Ressource();

        $ressource->setTitle($jsonData->title);
        $ressource->setContent($jsonData->content);
        $ressource->setPath($jsonData->path);
        $ressource->setClassroom($classroom);
        $ressource->setUser($user);

        $em = $this->getDoctrine()->getManager();
        $em->persist($ressource);
        $em->flush();

        return $this->json($this->render->normalizeByGroup($ressource, $this->group), 201);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"PUT"}, requirements={"id": "\d+"})
     */
    public function edit($id, Request $request, RessourceRepository $ressourceRepository, ClassroomRepository $classroomRepository, UserRepository $userRepository)
    {
        $jsonData = json_decode($request->getContent());
        $classroom = $classroomRepository->find($jsonData->classroom);
        $user = $userRepository->find($jsonData->user);

        $ressource = $ressourceRepository->getRessource($id);

        if($ressource) {
            if($ressource->getId()) {
                $ressource->setTitle($jsonData->title);
                $ressource->setContent($jsonData->content);
                $ressource->setPath($jsonData->path);
                $ressource->setClassroom($classroom);
                $ressource->setUser($user);

                $ressource->setUpdatedAt(new DateTime());

                $em = $this->getDoctrine()->getManager();
                $em->flush();

                return $this->json($this->render->normalizeByGroup($ressource, $this->group), 201);
            }

            return $this->json(["Cette resssource n'existe pas"], 404);
        }

        return $this->json(["Cette ressource n'existe pas"], 404);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"}, requirements={"id": "\d+"})
     */
    public function delete($id, RessourceRepository $ressourceRepository)
    {
        $ressource = $ressourceRepository->getRessource($id);

        if($ressource) {
            if($ressource->getId()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($ressource);
                $em->flush();

                return $this->json(["Ressource supprimée"], 201);
            }

            return $this->json(["Cette ressource n'existe pas"], 404);
        }

        return $this->json(["Cette ressource n'existe pas"], 404);
    }
}
