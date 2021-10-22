<?php

namespace App\Controller\Api;

use Doctrine\ORM\EntityManagerInterface;

use App\Helper\JsonRequestHelper;
use App\Helper\JsonResponseHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class ApiController extends AbstractController
{
    public function __construct(protected EntityManagerInterface $em, protected JsonRequestHelper $requestHelper, protected JsonResponseHelper $responseHelper)
    {
    }
}