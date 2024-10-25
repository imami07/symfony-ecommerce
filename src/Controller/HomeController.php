<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\ProductManager;
use App\Service\CategoryManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;



class HomeController extends AbstractController
{
    public function __construct(
        private ProductManager $productManager,
        private CategoryManager $categoryManager
    ) {
    }

    #[Route('', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('shop/index.html.twig', [
            'featured_products' => $this->productManager->getFeatured(),
            'categories' => $this->categoryManager->findAll()
        ]);
    }
}