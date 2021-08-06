<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class MyClass
{

    public function __construct()
    {
        echo "I'm constructor ";
    }
    /**
     * @param null
     */
    public function index(): Response
    {
        return new Response("<h1>Hello from controller</h1>");
    }
}