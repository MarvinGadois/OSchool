<?php

namespace App\Services;

use Symfony\Component\Serializer\SerializerInterface;

class Render {

    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function normalizeByGroup($data, $group = [])
    {
        return $this->serializer->normalize($data, null, ['groups' => $group]);
    }
}