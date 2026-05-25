<?php

namespace App\Handler;

use App\DTO\CartItemDTO;
use App\Interface\CartInterface;
use App\Service\SessionCart;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class CartHandler
{
    public function __construct(
        #[Autowire(service: SessionCart::class)]
        private readonly CartInterface $cart
    ) {}

    public function add(int $productId, int $quantity): void
    {
        $this->cart->add($productId, $quantity);
    }

    public function remove(int $productId): void
    {
        $this->cart->remove($productId);
    }

    /** @return CartItemDTO[] */
    public function getItems(): array
    {
        return $this->cart->getItems();
    }

    public function clear(): void
    {
        $this->cart->clear();
    }
}
