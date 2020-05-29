<?php

namespace App\Controller\Api\V1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1", name="api_v1_")
 */
class MainController extends AbstractController
{
    /**
     * @Route("/doc", name="doc")
     */
    public function index()
    {
        return $this->render('api/v1/main/doc.html.twig', []);
    }
}
