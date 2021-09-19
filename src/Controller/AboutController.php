<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(): Response
    {
        $hi = "hello World";

        $users = [
            [
                'username'=>'John Doe',
                'subscribed'=>false,
                'created_at'=>time()
            ],
            [
                'username'=>'Mary Ann',
                'subscribed'=>true,
                'created_at'=>time()
            ]

        ];

        return $this->render('about/index.html.twig', [
            'controller' => 'AboutController', 'hello1'=>$hi, 'online' => true,
            'users' => $users
        ]);
    }


    #[Route('/log', name: 'log')]
    public function dev(LoggerInterface $logger): ?Response  {
        $logger->info('I just got the logger');
        $logger->error('An error occurred');
        $logger->critical('I left the oven on!', [
            // include extra "context" info in your logs
            'cause' => 'in_hurry',
        ]);
        dd($logger);
    }

}
