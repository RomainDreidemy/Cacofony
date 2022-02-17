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
    {/** @var Post|false $post */
        $post = $this->postManager->findOneBy('id', $postId);

        if ($post && $this->hasUserAccess($post, $user)) {
            return $this->postManager->remove($postId);
        }

        return false;
    }

    public function update(int $postId, User $user, string $title, string $content): Post|false
    {
        /** @var Post|false $post */
        $post = $this->postManager->findOneBy('id', $postId);

        if ($post && $this->hasUserAccess($post, $user)) {
            return $this->postManager->update($postId, ['title' => $title, 'content' => $content]);
        }

        return false;
    }

    private function hasUserAccess(Post $post, User $user): bool
    {
        return $user->getIs_admin() || $user->getId() === $post->getAuthorId();
    }
}