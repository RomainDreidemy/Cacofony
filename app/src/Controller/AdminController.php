<?php

namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;
use App\Service\UserService;
use Cacofony\BaseClasse\BaseController;
use Cacofony\Helper\AuthHelper;

class AdminController extends BaseController
{

    /**
     * @Route(path="/admin/users", name="admin_user_list")
     */
    public function getUserList(UserManager $userManager)
    {
        if (!AuthHelper::isLoggedIn() || !AuthHelper::getLoggedUser()->is_admin) {
            $this->HTTPResponse->redirect('/');
        }

        $this->render('Admin/users', ['users' => $userManager->findAll()], '');
    }

    /**
     * @Route(path="/admin/user/{id}/delete", name="admin_user_list")
     */
    public function getUserDelete(int $id, UserManager $userManager, UserService $userService)
    {
        if (!AuthHelper::isLoggedIn() || !AuthHelper::getLoggedUser()->is_admin) {
            $this->HTTPResponse->redirect('/');
        }

        /** @var User|false $userToDelete */
        $userToDelete = $userManager->findOneBy('id', $id);

        if (!$userToDelete) {
            $this->HTTPResponse->redirect('/admin/users');
        }

        if($userToDelete->getId() === AuthHelper::getLoggedUser()->id) {
            $this->HTTPResponse->redirect('/admin/users?errorMessage=Vous ne pouvez pas vous supprimer vous même');
        }

        $userService->delete($id);

        $this->HTTPResponse->redirect('/admin/users?successMessage=L\'utilisateur a été supprimé');
    }
}