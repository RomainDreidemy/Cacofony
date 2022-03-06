<?php

namespace App\Controller;

use App\Service\CommentService;
use App\Service\DebugService;
use App\Service\PostService;
use Cacofony\BaseClasse\BaseController;
use Cacofony\Helper\AuthHelper;

class CommentController extends BaseController
{

    /**
     * @Route(path="/post/{id}/comment", name="post_comment")
     */
    public function postComment(int $id, CommentService $commentService)
    {
        if (!AuthHelper::isLoggedIn()) {
            $this->HTTPResponse->redirect('/');
        }

        $user = AuthHelper::getLoggedUser();

        $content = $this->HTTPRequest->getRequest('content');

        $commentService->create($id, $user->id, $content);

        $this->HTTPResponse->redirect('/article/' . $id);
    }
}