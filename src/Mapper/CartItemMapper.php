<?php

namespace App\Mapper;

use App\DTO\CartItemDTO;

class CartItemMapper
{
    public function fromSessionData(array $cart): array
    {
        return array_map(
            fn(int $productId, int $quantity) => new CartItemDTO($productId, $quantity),
            array_keys($cart),
            $cart
        );
    }
}
