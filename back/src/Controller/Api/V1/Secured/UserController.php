<?php

namespace App\Controller\Api\V1\Secured;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


/**
 * @Route("/api/secured/v1/user", name="api_secured_v1_user_")
 */
class UserController extends AbstractController
{
    
    /**
     * @Route("/current", name="currentUserConnected")
     */
    public function getCurrentUser(SerializerInterface $serializer)
    {
        if ($this->container->has('security.token_storage')) {

            $user = $this->container->get('security.token_storage')->getToken()->getUser();

            // On demande au Serializer de normaliser nos films (transformer nos objets en array)
            // De plus, on lui spécifie qu'on veut normaliser selon les groupes voulus
            $array = $serializer->normalize($user, null, ['groups' => ['infos_user', 'school_user', 'school', 'classrooms_user', 'infos_classroom', 'infos_subject']]);

            // La méthode json() retourne un objet JsonResponse qui est un objet Response particulier
            return $this->json($array);
        }

        return $this->json([], 404);
    }
}
