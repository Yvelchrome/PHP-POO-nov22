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
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->creationDate;
    }

    /**
     * @param string $creationDate 
     * @return self
     */
    public function setCreationDate(string $creationDate): self
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getChildId(): int
    {
        return $this->childId;
    }

    /**
     * @param int $childId 
     * @return self
     */
    public function setChildId(int $childId): self
    {
        $this->childId = $childId;
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
     * @return self
     */
    public function setPosition(int $position): self
    {
        $this->position = $position;
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
     * @return self
     */
    public function setCommentId(int $commentId): self
    {
        $this->commentId = $commentId;
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
     * @return self
     */
    public function setPostId(int $postId): self
    {
        $this->postId = $postId;
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
     * @return self
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param int $userId 
     * @return self
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
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
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
