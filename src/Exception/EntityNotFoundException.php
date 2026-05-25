<?php

namespace App\Exception;

class EntityNotFoundException extends \RuntimeException
{
    public static function forClass(string $class, int $id): self
    {
        return new self(sprintf('%s #%d not found.', $class, $id));
    }
}
