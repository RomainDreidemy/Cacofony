<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Manager\CommentManager;
use App\Manager\UserManager;
use App\Service\CommentService;
use App\Service\DebugService;
use App\Service\PostService;
use App\Service\UserService;
use Cacofony\BaseClasse\BaseController;
use Cacofony\Helper\AuthHelper;

class ProfileController extends BaseController
{
    /**
     * @Route(path="/profile", name="get_profile")
     */
    public function getProfile(UserManager $userManager)
    {
        if (!AuthHelper::isLoggedIn()) {
            $this->HTTPResponse->redirect('/?errorMessage=Vous devez être connecter pour ajouter un commentaire');
        }

        $user = $userManager->findOneBy('id', AuthHelper::getLoggedUser()->id);

        $this->render('Frontend/Profile/show', ['user' => $user], 'Mon profil');
    }

    /**
     * @Route(path="/profile", name="get_profile")
     */
    public function postProfile(UserService $userService)
    {
        if (!AuthHelper::isLoggedIn()) {
            $this->HTTPResponse->redirect('/?errorMessage=Vous devez être connecter pour ajouter un commentaire');
        }

        $id = $this->HTTPRequest->getRequest('id');
        $firstName = $this->HTTPRequest->getRequest('first_name');
        $last_name = $this->HTTPRequest->getRequest('last_name');
        $email = $this->HTTPRequest->getRequest('email');
        $isAdmin = (bool)$this->HTTPRequest->getRequest('is_admin');
        $password = $this->HTTPRequest->getRequest('password');
        $passwordVerify = $this->HTTPRequest->getRequest('password_verify');

        $response = $userService->update($id, $firstName, $last_name, $email, $isAdmin, $password, $passwordVerify);

        if (!$response) {
            $this->HTTPResponse->redirect('/?errorMessage=Une erreur est survenu');
        }

        $this->HTTPResponse->redirect('/profile?successMessage=Votre profil a été modifié');
    }
}