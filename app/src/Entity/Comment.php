<?php

namespace App\Entity;

use Cacofony\BaseClasse\BaseEntity;
use DateTime;
use Exception;

class Comment extends BaseEntity
{
    private int $id;
    private int $postId;
    private int $authorId;
    private DateTime $publishedAt;
    private string $content;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Post
     */
    protected function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getPublishedAt(): DateTime
    {
        return $this->publishedAt;
    }

    /**
     * @param string $publishedAt
     * @return Post
     * @throws Exception
     */
    public function setPublishedAt(string $publishedAt): self
    {
        $this->publishedAt = new DateTime($publishedAt);
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Post
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $authorId
     * @return Post
     */
    public function setPostId(int $postId): self
    {
        $this->postId = $postId;
        return $this;
    }


    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     * @return Comment
     */
    public function setAuthorId(int $authorId): self
    {
        $this->authorId = $authorId;
        return $this;
    }
}