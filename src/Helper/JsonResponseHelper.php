<?php

namespace App\Helper;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class JsonResponseHelper
{
    private SerializerInterface $serialiser;
    public function __construct(SerializerInterface $serialiser)
    {
        $this->serialiser = $serialiser;
    }

    public function createResponse($entity, array $serializationGroups, int $status = 200): JsonResponse
    {
        return new JsonResponse($this->serialiser->serialize($entity, 'json', ['groups' => $serializationGroups]), $status);
    }
}