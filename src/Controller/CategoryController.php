<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Controller for category pages.
 */
class CategoryController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAllWithProductCount();

        return $this->render('categories/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/category/{id}/products', name: 'app_category_products')]
    public function products(Category $category, ProductRepository $productRepository): Response
    {
        $products = $productRepository->findByCategory($category);

        return $this->render('categories/products.html.twig', [
            'category' => $category,
            'products' => $products,
        ]);
    }
}
