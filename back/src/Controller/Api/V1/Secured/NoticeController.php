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

        $array = $serializer->normalize($notices, null, ['groups' => ['notices', 'infos_classroom', 'school', 'infos_user','user_subject', 'infos_subject']]);

        return $this->json($array);
    }

    /**
     * @Route("/user/{id}", name="browseByUser", requirements={"id":"\d+"})
     */
    public function browseByUser($id, SerializerInterface $serializer, NoticeRepository $noticeRepository)
    {
        $notices = $noticeRepository->getNoticesByUserId($id);

        $array = $serializer->normalize($notices, null, ['groups' => ['notices', 'infos_classroom', 'school', 'infos_user', 'infos_subject']]);

        return $this->json($array);
    }

    /**
     * @Route("/{id}", name="browseById", requirements={"id":"\d+"})
     */
    public function read($id, SerializerInterface $serializer, NoticeRepository $noticeRepository)
    {
        $notices = $noticeRepository->getNotice($id);

        $array = $serializer->normalize($notices, null, ['groups' => ['notices', 'infos_classroom', 'school', 'infos_user', 'infos_subject']]);

        return $this->json($array);
    }
}