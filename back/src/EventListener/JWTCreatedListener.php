<?php

namespace App\EventListener;

use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Serializer\SerializerInterface;

class JWTCreatedListener {

    /**
     * @var RequestStack
     */
    private $requestStack;

    private $userRepository;

    private $serializer;


    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack, UserRepository $userRepository, SerializerInterface $serializer)
    {
        $this->requestStack = $requestStack;
        $this->userRepository = $userRepository;
        $this->serializer = $serializer;
    }

    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    { 
        $payload = $event->getData();

        $user = $this->userRepository->getUserByEmail($payload['username']);

        $array = $this->serializer->normalize($user, null, ['groups' => ['infos_user', 'school_user', 'school', 'classrooms_user', 'infos_classroom', 'infos_subject']]);

        $payload['user'] = $array;

        $event->setData($payload);
    }
}

