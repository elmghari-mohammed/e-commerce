<?php

namespace App\Exception;

class CartException extends \RuntimeException
{
    public static function productNotFound(int $productId): self
    {
        return new self(sprintf('Product #%d not found in cart.', $productId));
    }

    public static function invalidQuantity(): self
    {
        return new self('Quantity must be greater than zero.');
    }
}
