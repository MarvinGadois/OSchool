<?php

namespace App\Controller\Api\V1\Secured;

use App\Entity\Notice;
use App\Repository\NoticeRepository;
use App\Repository\UserRepository;
use App\Services\Render;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/secured/v1/notices", name="api_secured_v1_notices_")
 */
class NoticeController extends AbstractController
{
    private $group;
    private $render;

    public function __construct(Render $render)
    {
        $this->group = [
            'notices',
            'infos_classroom',
            'school',
            'infos_user',
            'infos_subject',
            'user_subject'
        ];

        $this->render = $render;
    }

    /**
     * @Route("/", name="browse")
     */
    public function browse(SerializerInterface $serializer, NoticeRepository $noticeRepository)
    {
        $notices = $noticeRepository->getNotices();

        return $this->json($this->render->normalizeByGroup($notices, $this->group));
    }

    /**
     * @Route("/author/{id}", name="browseByAuthor", requirements={"id":"\d+"})
     */
    public function browseByAuthor($id, SerializerInterface $serializer, NoticeRepository $noticeRepository)
    {
        $notices = $noticeRepository->getNoticesByAuthorId($id);

        return $this->json($this->render->normalizeByGroup($notices, $this->group));
    }

    /**
     * @Route("/receiver/{id}", name="browseByReceiver", requirements={"id":"\d+"})
     */
    public function browseByReceiver($id, SerializerInterface $serializer, NoticeRepository $noticeRepository)
    {
        $notices = $noticeRepository->getNoticesByReceiverId($id);

        return $this->json($this->render->normalizeByGroup($notices, $this->group));
    }

    /**
     * @Route("/author/{author_id}/receiver/{receiver_id}", name="browseByAuthorAndReceiver", requirements={"author_id":"\d+", "receiver_id":"\d+"})
     */
    public function browseByAuthorAndReceiver($author_id, $receiver_id, SerializerInterface $serializer, NoticeRepository $noticeRepository)
    {
        $notices = $noticeRepository->getNoticesByAuthorAndReceiver($author_id, $receiver_id);

        return $this->json($this->render->normalizeByGroup($notices, $this->group));
    }

    /**
     * @Route("/author/{author_id}/subject/{sub_id}", name="browseByAuthorAndSubject", requirements={"author_id":"\d+", "sub_id":"\d+"})
     */
    public function browseByAuthorAndSubject($author_id, $sub_id, SerializerInterface $serializer, NoticeRepository $noticeRepository)
    {
        $notices = $noticeRepository->getNoticesByAuthorAndSubject($author_id, $sub_id);

        return $this->json($this->render->normalizeByGroup($notices, $this->group));
    }

    /**
     * @Route("/receiver/{receiver_id}/subject/{sub_id}", name="browseByReceiverAndSubject", requirements={"receiver_id":"\d+", "sub_id":"\d+"})
     */
    public function browseByReceiverAndSubject($receiver_id, $sub_id, SerializerInterface $serializer, NoticeRepository $noticeRepository)
    {
        $notices = $noticeRepository->getNoticesByReceiverAndSubject($receiver_id, $sub_id);

        return $this->json($this->render->normalizeByGroup($notices, $this->group));
    }

    /**
     * @Route("/{id}", name="browseById", requirements={"id":"\d+"})
     */
    public function read($id, SerializerInterface $serializer, NoticeRepository $noticeRepository)
    {
        $notices = $noticeRepository->getNotice($id);

        return $this->json($this->render->normalizeByGroup($notices, $this->group));
    }

    /**
     * @Route("/add", name="add", methods={"POST"})
     */
    public function add(Request $request, UserRepository $userRepository)
    {
        $jsonData = json_decode($request->getContent());
        $author = $userRepository->find($jsonData->author);
        $receiver = $userRepository->find($jsonData->receiver);

        $notice = new Notice();

        $notice->setTitle($jsonData->title);
        $notice->setContent($jsonData->content);
        $notice->setStatus($jsonData->status);
        $notice->setAuthor($author);
        $notice->setReceiver($receiver);

        $em = $this->getDoctrine()->getManager();
        $em->persist($notice);
        $em->flush();

        return $this->json($this->render->normalizeByGroup($notice, $this->group), 201);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"PUT"}, requirements={"id": "\d+"})
     */
    public function edit($id, Request $request, NoticeRepository $noticeRepository, UserRepository $userRepository)
    {
        $jsonData = json_decode($request->getContent());
        $author = $userRepository->find($jsonData->author);
        $receiver = $userRepository->find($jsonData->receiver);

        $notice = $noticeRepository->getNotice($id);

        if($notice) {
            if($notice->getId()) {
                $notice->setTitle($jsonData->title);
                $notice->setContent($jsonData->content);
                $notice->setStatus($jsonData->status);
                $notice->setAuthor($author);
                $notice->setReceiver($receiver);

                $notice->setUpdatedAt(new DateTime());

                $em = $this->getDoctrine()->getManager();
                $em->flush();

                return $this->json($this->render->normalizeByGroup($notice, $this->group), 201);
            }

            return $this->json(["Ce mot n'existe pas"], 404);
        }

        return $this->json(["Ce mot n'existe pas"], 404);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"DELETE"}, requirements={"id": "\d+"})
     */
    public function delete($id, NoticeRepository $noticeRepository)
    {
        $notice = $noticeRepository->getNotice($id);

        if($notice) {
            if($notice->getId()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($notice);
                $em->flush();

                return $this->json(["Mot supprimé"], 201);
            }

            return $this->json(["Ce mot n'existe pas"], 404);
        }

        return $this->json(["Ce mot n'existe pas"], 404);
    }
}