<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{
    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->query("select * from Post");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function addPost(Post $post, bool $getArray = false)
    {
        $insert = $this->pdo->prepare('INSERT INTO Post (title, content, user_id, image) VALUES (:title, :content, :user_id, :image)');
        $insert->bindValue(':title', htmlspecialchars($post->getTitle()), \PDO::PARAM_STR);
        $insert->bindValue(':content', nl2br(htmlspecialchars($post->getContent())), \PDO::PARAM_STR);
        $insert->bindValue(':user_id', $post->getUser_id(), \PDO::PARAM_INT);
        $insert->bindValue(':image', $post->getImage(), \PDO::PARAM_STR);

        return $insert->execute() ;
    }
    public function deletePost(int $id): bool
    {
        $delete = $this->pdo->prepare('DELETE FROM Post WHERE id = :id');
        $delete->bindValue(':id', $id, \PDO::PARAM_INT);

        // $manager = new CommentManager();  a voir avec Igal quand il a fini pour pouvoir supprimer les comm
        // $manager->deleteCommentsByPostId($id);

        return $delete->execute();
    }
    public function updatePost(Post $post, bool $getArray = false)
    {
        // $id=$_POST['id'];
        $update = $this->pdo->prepare('UPDATE Post SET title = :title, image = :image, content = :content, image = :image WHERE id = :id');
        $update->bindValue(':title', htmlspecialchars( $post->getTitle()), \PDO::PARAM_STR);
        $update->bindValue(':content', nl2br(htmlspecialchars( $post->getContent())), \PDO::PARAM_STR);
        $update->bindValue(':id',  $post->getId(), \PDO::PARAM_INT);
        $update->bindValue(':image', $post->getImage(), \PDO::PARAM_STR);

        return $update->execute() ;
    }
    public function getPostById(int $id, bool $array = false)
    {
        $query = $this->pdo->prepare('SELECT * FROM Post WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();

        if ($array) {
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        }

        // $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Post');
        return $query->fetch();
    }

}
