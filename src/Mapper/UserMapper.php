<?php

namespace App\Mapper;

use App\DTO\RegistrationDTO;
use App\Entity\User;

class UserMapper
{
    public function toEntity(RegistrationDTO $dto): User
    {
        $user = new User();
        $user->setFullName($dto->fullName);
        $user->setEmail($dto->email);
        $user->setRoles(['ROLE_USER']);

        return $user;
    }
}
