<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Manager\CommentManager;
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

    /**
     * @Route(path="/comment/{id}/delete", name="get_comment_delete")
     */
    public function getCommentDelete(int $id, CommentService $commentService, CommentManager $commentManager)
    {
        if (!AuthHelper::isLoggedIn()) {
            $this->HTTPResponse->redirect('/');
        }

        $user = AuthHelper::getLoggedUser();

        /** @var Comment|false $comment */
        $comment = $commentManager->findOneBy('id', $id);

        if (!$comment || ($user->id !== $comment->getAuthorId() && !$user->is_admin)) {
            $this->HTTPResponse->redirect('/');
        }

        $commentService->delete($id);

        $this->HTTPResponse->redirect('/article/' . $comment->getPostId());
    }
}