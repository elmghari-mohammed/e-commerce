<?php

namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserSecurity
{
    public function __construct(
        private readonly TokenStorageInterface $tokenStorage,
        private readonly AuthenticationUtils $authenticationUtils,
    ) {}

    public function getUser(): ?User
    {
        $token = $this->tokenStorage->getToken();

        if (null === $token) {
            return null;
        }

        $user = $token->getUser();

        return $user instanceof User ? $user : null;
    }

    public function isAuthenticated(): bool
    {
        return null !== $this->getUser();
    }

    public function getLastAuthenticationError(): ?string
    {
        $error = $this->authenticationUtils->getLastAuthenticationError();

        return $error?->getMessage();
    }

    public function getLastUsername(): ?string
    {
        return $this->authenticationUtils->getLastUsername();
    }
}
