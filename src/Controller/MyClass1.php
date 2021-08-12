<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MyClass1 extends AbstractController
{
    /**
     * @param null
     */
    public function hell(): Response
    {
        return $this->json(["message"=>"<h1>Hello from My Class 1</h1>"]);
    }
}