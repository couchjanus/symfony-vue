<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CustomerRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Security\Core\Security;

class AuthController extends AbstractController
{
    
    public function __construct(
        private CustomerRepository $userRepository,
        private Security $security,
        private SerializerInterface $serializer
    )
    {
    }
    #[Route('/api/register', name:'user.register')]
    public function app(Request $request):JsonResponse
    {
        $jsonData = json_decode($request->getContent());
        $user = $this->userRepository->create($jsonData);
        return new JsonResponse([
            'user' => $this->serializer->serialize($user, 'json')
        ], 201);
    }
}