<?php

namespace App\Service;

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
}