<?php

namespace App\Service;

use App\Entity\Post;
use App\Entity\User;
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

    public function delete(int $postId, User $user): bool
    {
        if ($user->getIs_admin()) {
            return $this->postManager->remove($postId);
        } else {
            /** @var Post $post */
            $post = $this->postManager->findOneBy('id', $postId);

            if ($post->getAuthorId() === $user->getId()) {
                return $this->postManager->remove($postId);
            } else {
                return false;
            }
        }
    }
}