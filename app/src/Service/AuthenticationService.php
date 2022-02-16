<?php

namespace App\Service;

use App\Manager\UserManager;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthenticationService
{
    private UserManager $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function auth($email, $password) {
        $user = $this->userManager->findOneBy('email', $email);

        if (!$user) {
            return false;
        } else {
            if (password_verify($password, $user->getPassword())) {
                $jwt = JWT::encode(['user' => $user->__toArray()], $_ENV['APP_SECRET'], 'HS256');
                $_SESSION['user_badge'] = $jwt;
            } else {
                return false;
            }
        }

        return true;
    }
}