<?php

namespace App\Service;

use App\Entity\Comment;
use App\Manager\CommentManager;

class CommentService
{
    public function __construct(private CommentManager $commentManager)
    {
    }

    public function create($postId, $authorId, $content): Comment|false
    {
        return $this->commentManager->create([
            'postId' => $postId,
            'authorId' => $authorId,
            'content' => $content,
            'publishedAt' => (new \DateTime())->format('Y-m-d H:i:s')
        ]);
    }

}