<?php

namespace App\Interface;

use App\DTO\CartItemDTO;

interface CartInterface
{
    public function add(int $productId, int $quantity): void;
    public function remove(int $productId): void;
    public function getItems(): array; // returns CartItemDTO[]
    public function clear(): void;
}
