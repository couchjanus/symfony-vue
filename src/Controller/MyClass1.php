<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class MyClass1
{

    public function __construct()
    {
        echo "I'm constructor ";
    }
    /**
     * @param null
     */
    public function hell(): Response
    {
        return new Response("<h1>Hello from My Class 1</h1>");
    }
}