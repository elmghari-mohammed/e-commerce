<?php

namespace App\Exception;

class UserRegistrationException extends \RuntimeException
{
    public static function emailAlreadyExists(string $email): self
    {
        return new self(sprintf('An account with email "%s" already exists.', $email));
    }
}
