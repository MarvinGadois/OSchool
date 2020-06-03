<?php

namespace App\Controller\Api\V1\Secured;

use App\Repository\NoticeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/secured/v1/notices", name="api_secured_v1_notices_")
 */
class NoticeController extends AbstractController
{
    /**
     * @Route("/", name="browse")
     */
    public function browse(SerializerInterface $serializer, NoticeRepository $noticeRepository)
    {
        $notices = $noticeRepository->getNotices();

        $array = $serializer->normalize($notices, null, ['groups' => ['notices', 'infos_classroom', 'school', 'infos_user', 'infos_subject']]);

        return $this->json($array);
    }
}
