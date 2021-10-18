<?php

namespace App\Helper;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class JsonResponseHelper
{
    private SerializerInterface $serialiser;
    public function __construct(SerializerInterface $serialiser)
    {
        $this->serialiser = $serialiser;
    }

    public function createResponse($entity, array $serializationGroups, int $status){
        return new Response($this->serialiser->serialize($entity, 'json', ['groups' => $serializationGroups]),
        $status,
        ['content-type' => 'application/json']);
    }
}