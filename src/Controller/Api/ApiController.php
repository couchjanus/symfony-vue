<?php

namespace App\Controller\Api;

use Doctrine\ORM\EntityManagerInterface;

use App\Helper\JsonRequestHelper;
use App\Helper\JsonResponseHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    protected EntityManagerInterface $em;
    protected JsonRequestHelper $requestHelper;
    protected JsonResponseHelper $responseHelper;

    public function __construct(EntityManagerInterface $em, JsonRequestHelper $requestHelper, JsonResponseHelper $responseHelper)
    {
        $this->em = $em;
        $this->requestHelper = $requestHelper;
        $this->responseHelper = $responseHelper;
    }
}