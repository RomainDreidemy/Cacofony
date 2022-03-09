<?php

namespace App\Service;

use App\Entity\User;
use App\Manager\UserManager;

class UserService
{
    public function __construct(private UserManager $userManager)
    {
    }

    public function delete(int $id): bool
    {
        return $this->userManager->remove($id);
    }

    public function update(int $id, string $firstName, string $lastName, string $email, bool $isAdmin, string $password, string $passwordVerify): false|User
    {

        $updateInfos = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'is_admin' => $isAdmin,
        ];

        if (!empty($password) && !empty($passwordVerify) && $password === $passwordVerify) {
            $updateInfos['password'] = $this->hashPassword($password);
        }

        return $this->userManager->update($id, $updateInfos);
    }

    private function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}