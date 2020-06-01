<?php

namespace App\Controller\Api\V1\Secured;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/secured/v1/news", name="api_secured_v1_news_")
 */
class NewsController extends AbstractController
{
    /**
     * @Route("/", name="browse")
     */
    public function browse()
    {

    }
}
