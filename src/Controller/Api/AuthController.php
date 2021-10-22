<?php

namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Customer;

#[Route('/api')]
class AuthController extends ApiController
{
    #[Route('/register', name: 'customer.register')]
    public function app(Request $request) : JsonResponse
    {
        $jsonData = $this->requestHelper->handleRequest($request->getContent(), 'users', Customer::class);
        $customer = $this->em->getRepository(Customer::class)->createNewCustomer($jsonData);
        return $this->responseHelper->createResponse($customer, ['customers'], 201);
    }

    #[Route('/profile', name: 'user.profile')]
    public function profile(Request $request) : JsonResponse
    {
        $currentUser = $this->getUser();
        return $this->responseHelper->createResponse($currentUser, ['customers'], 200);
    }

}
