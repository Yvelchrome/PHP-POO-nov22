<?php

namespace App\Entity;

class Child extends BaseEntity
{
    private int $childId;
    private int $userId;
    private int $postId;
    private string $content;
    private string $username;
    private string $creationDate;
    private int $commentId;
    private int $position;

    /**
     * @return int
     */
    public function getChildId(): int
    {
        return $this->childId;
    }

    /**
     * @param int $childId
     * @return Child
     */
    public function setChildId(int $childId): Child
    {
        $this->childId = $childId;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return Child
     */
    public function setUserId(int $userId): Child
    {
        $this->userId = $userId;
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
     * @param int $postId
     * @return Child
     */
    public function setPostId(int $postId): Child
    {
        $this->postId = $postId;
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
     * @return Child
     */
    public function setContent(string $content): Child
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Child
     */
    public function setUsername(string $username): Child
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->creationDate;
    }

    /**
     * @param string $creationDate
     * @return Child
     */
    public function setCreationDate(string $creationDate): Child
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getCommentId(): int
    {
        return $this->commentId;
    }

    /**
     * @param int $commentId
     * @return Child
     */
    public function setCommentId(int $commentId): Child
    {
        $this->commentId = $commentId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return Child
     */
    public function setPosition(int $position): Child
    {
        $this->position = $position;
        return $this;
    }
}
