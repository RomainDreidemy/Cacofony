<?php

namespace App\Service;

use App\Entity\Post;
use App\Manager\PostManager;

class PostService
{
    public function __construct(private PostManager $postManager)
    {}

    public function create(string $title, string $content, int $authorId): Post|false
    {
        $post = $this->postManager->create([
            'title' => $title,
            'content' => $content,
            'authorId' => $authorId,
            'createdAt' => (new \DateTime('now'))->format('Y-m-d H:i:s')
        ]);

        if (!$post) {
            return false;
        }

        return $post;
    }
}