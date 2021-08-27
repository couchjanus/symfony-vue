<?php

namespace App\Controller;

use App\Entity\Brand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrandController extends AbstractController
{
    #[Route('/brand', name: 'brand')]
    public function index(): Response
    {
        return $this->render('brand/index.html.twig', [
            'controller_name' => 'BrandController',
        ]);
    }

    #[Route('/create-brand', name: 'create_brand')]
    public function createBrand(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $brand = new Brand();
        $brand->setName('Dogs House');
        $brand->setDescription('Bla bla bla');

        $entityManager->persist($brand);
        $entityManager->flush();

        return new Response('New $brand created successfuly'.$brand->getId());
    }
    #[Route('/update-brand/{id}', name: 'update_brand')]
    public function updateBrand(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $brand = $this->getDoctrine()->getRepository(Brand::class)->find($id);
        $brand->setName('Cats House');
        $brand->setDescription('Only cool cats');

        $entityManager->persist($brand);
        $entityManager->flush();

        return new Response('$brand updated successfuly'.$brand->getDescription());
    }

    #[Route('/delete-brand/{id}', name: 'delete_brand')]
    public function deleteBrand(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $brand = $this->getDoctrine()->getRepository(Brand::class)->find($id);
        $entityManager->remove($brand);

        $entityManager->flush();

        return new Response('brand deleted successfuly '.$id);
    }
}
