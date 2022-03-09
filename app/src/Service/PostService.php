<?php

namespace App\Service;

use App\Entity\Post;
use App\Entity\User;
use App\Manager\PostManager;

class PostService
{
    public function __construct(private PostManager $postManager)
    {}

    public function create(string $title, string $content, ?array $file, int $authorId): Post|false
    {
        $filename = null;

        if ($file && ($file['type'] === 'image/png' || $file['type'] === 'image/jpeg')) {
            $filename = $file['name'];
            move_uploaded_file($file['tmp_name'], __DIR__ . "/../../public/upload/{$filename}");
        }

        $post = $this->postManager->create([
            'title' => $title,
            'content' => $content,
            'authorId' => $authorId,
            'createdAt' => (new \DateTime('now'))->format('Y-m-d H:i:s'),
            'picture_link' => $filename
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