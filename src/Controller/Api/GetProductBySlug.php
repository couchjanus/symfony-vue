<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

use App\Entity\Product;

#[AsController]
class GetProductBySlug extends AbstractController
{
    public function __invoke(string $slug){
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy(['slug'=> $slug]);
        if(!$product){
            throw $this->createNotFoundException('No product found for this slug');
        }
        return $product;
    }
}