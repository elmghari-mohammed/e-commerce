<?php

namespace App\Controller;

use App\Entity\Product;
use App\Handler\CartHandler;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Controller for product pages.
 */
class ProductController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function home(ProductRepository $productRepository): Response
    {
        return $this->render('shop/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    #[Route('/products', name: 'app_products')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('products/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/product/{id}', name: 'app_product')]
    public function show(Product $product): Response
    {
        return $this->render('products/show.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/product/{id}/add-to-cart', name: 'cart_add', methods: ['POST'])]
    public function addToCart(Product $product, Request $request, CartHandler $cartHandler): Response
    {
        $quantity = max(1, (int) $request->request->get('quantity', 1));
        $cartHandler->add($product->getId(), $quantity);

        return $this->redirectToRoute('cart_index');
    }
}
