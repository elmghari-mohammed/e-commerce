<?php

namespace App\Service;

use App\Interface\CartInterface;
use App\Mapper\CartItemMapper;
use Symfony\Component\HttpFoundation\RequestStack;

class SessionCart implements CartInterface
{
    private const SESSION_KEY = 'cart';

    public function __construct(
        private readonly RequestStack $requestStack,
        private readonly CartItemMapper $cartItemMapper,
    ) {}

    public function add(int $productId, int $quantity): void
    {
        $session = $this->requestStack->getSession();
        $cart = $session->get(self::SESSION_KEY, []);
        $cart[$productId] = ($cart[$productId] ?? 0) + $quantity;
        $session->set(self::SESSION_KEY, $cart);
    }

    public function remove(int $productId): void
    {
        $session = $this->requestStack->getSession();
        $cart = $session->get(self::SESSION_KEY, []);
        unset($cart[$productId]);
        $session->set(self::SESSION_KEY, $cart);
    }

    public function getItems(): array
    {
        $cart = $this->requestStack->getSession()->get(self::SESSION_KEY, []);

        return $this->cartItemMapper->fromSessionData($cart);
    }

    public function clear(): void
    {
        $this->requestStack->getSession()->remove(self::SESSION_KEY);
    }
}
