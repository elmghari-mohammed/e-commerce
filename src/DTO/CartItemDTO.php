<?php

namespace App\DTO;

class CartItemDTO
{
    public function __construct(
        public readonly int $productId,
        public readonly int $quantity,
    ) {}
}
