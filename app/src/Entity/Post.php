<?php

namespace App\Entity;

use Cacofony\BaseClasse\BaseEntity;
use DateTime;
use Exception;

class Post extends BaseEntity
{
    private int $id;
    private DateTime $createdAt;
    private string $title;
    private string $content;
    private string $picture_link;
    private int $authorId;

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
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return Post
     * @throws Exception
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = new DateTime($createdAt);
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Post
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
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
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     * @return Post
     */
    public function setAuthorId(int $authorId): self
    {
        $this->authorId = $authorId;
        return $this;
    }



    /**
     * @return string
     */
    public function getPicture_link(): string
    {
        return $this->picture_link;
    }

    /**
     * @param string $picture_link
     * @return Post
     */
    public function setPicture_link(string $picture_link): self
    {
        $this->picture_link = $picture_link;
        return $this;
    }
}