<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    /**
     * @Route("/create-category", name="create_category")
     */
    public function createCategory(): Response
    {
//        Метод $this->getDoctrine()->getManager() получает объект диспетчера сущностей Doctrine, который является наиболее важным объектом в Doctrine. Он отвечает за сохранение и выборку объектов из базы данных.
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createCategory(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $category = new Category();
        $category->setName('Cats');
        $category->setDescription('Bla bla bla');

        $entityManager->persist($category);
        $entityManager->flush();

        return new Response('New category created successfuly'.$category->getId());
    }

    /**
     * @Route("/category/{id}", name="category_show")
     */
    public function show(int $id): Response
    {
        $category = $this->getDoctrine()->getRepository(Category::class)->find($id);
        if(!$category){
            throw $this->createNotFoundException("No category found for id= ".$id);
        }
        return new Response('category has name = '.$category->getName());
    }
}
