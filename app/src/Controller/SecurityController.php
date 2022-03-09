<?php

namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;
use App\Service\AuthenticationService;
use App\Service\DebugService;
use Cacofony\BaseClasse\BaseController;
use Cacofony\Helper\AuthHelper;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class SecurityController extends BaseController
{
    /**
     * @Route(path="/login")
     * @return void
     */
    public function getLogin()
    {
        $this->render('Security/login', [], 'Please login');
    }

    /**
     * @Route(path="/login")
     * @return void
     */
    public function postLogin(AuthenticationService $authenticationService)
    {
        $email = $this->HTTPRequest->getRequest('email');
        $password = $this->HTTPRequest->getRequest('password');

        if($authenticationService->auth($email, $password)) {
            $this->HTTPResponse->redirect('/?successMessage=Vous êtes bien connecté.');
        } else {
            $this->HTTPResponse->redirect('/login?errorMessage=Les informations fourni ne nous permette pas de vous connecter.');
        }
    }

    /**
     * @Route(path="/logout")
     * @return void
     */
    public function getLogout()
    {
        AuthHelper::logout();
        $this->HTTPResponse->redirect('/');
    }
}