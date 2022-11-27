<?php

namespace App\Entity;

class Post extends BaseEntity
{
    private int $id;
    private string $content;
    private string $title;
    private string $user_id;
    private string $image;

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
    public function setId(int $id): Post
    {
        $this->id = $id;
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
    public function setContent(string $content): Post
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getUser_id(): string
    {
        return $this->user_id;
    }

   
    public function setUser_id(string $user_id): Post
    {
        $this->user_id = $user_id;
        return $this;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }

   
    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }


    public function getImage(): string
    {
        return $this->image;
    }

   
    public function setImage(string $image): Post
    {
        $this->image = $image;
        return $this;
    }
}
