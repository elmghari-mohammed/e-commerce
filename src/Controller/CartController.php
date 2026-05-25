<?php

namespace App\Controller;

use App\DTO\CartItemDTO;
use App\Handler\CartHandler;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Controller for cart pages.
 */
class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart_index')]
    public function index(CartHandler $cartHandler, ProductRepository $productRepository): Response
    {
        $items = $cartHandler->getItems();

        $cartData = array_map(function (CartItemDTO $item) use ($productRepository) {
            return [
                'product' => $productRepository->find($item->productId),
                'quantity' => $item->quantity,
            ];
        }, $items);

        return $this->render('cart/index.html.twig', [
            'cartData' => $cartData,
        ]);
    }

    #[Route('/cart/remove/{productId}', name: 'cart_remove', methods: ['POST'])]
    public function remove(int $productId, CartHandler $cartHandler): Response
    {
        $cartHandler->remove($productId);

        return $this->redirectToRoute('cart_index');
    }
}
