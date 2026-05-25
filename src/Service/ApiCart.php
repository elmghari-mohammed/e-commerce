<?php

namespace App\Service;

use App\Interface\CartInterface;

class ApiCart implements CartInterface
{
    public function add(int $productId, int $quantity): void
    {
        dd('ApiCart::add called', ['productId' => $productId, 'quantity' => $quantity]);
    }

    public function remove(int $productId): void
    {
        dd('ApiCart::remove called', ['productId' => $productId]);
    }

    public function getItems(): array
    {
        dd('ApiCart::getItems called');
    }

    public function clear(): void
    {
        dd('ApiCart::clear called');
    }
}
