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
        $insert = $this->pdo->prepare('INSERT INTO posts (title, content, user_id, image) VALUES (:title, :content, :user_id, :image)');
        $insert->bindValue(':title', htmlspecialchars($post['title']), \PDO::PARAM_STR);
        $insert->bindValue(':content', nl2br(htmlspecialchars($post['content'])), \PDO::PARAM_STR);
        $insert->bindValue(':user_id', $post['user_id'], \PDO::PARAM_INT);
        $insert->bindValue(':image', $post['image'], \PDO::PARAM_STR);

        return $insert->execute() ;
    }
    public function deletePost(int $id): bool
    {
        $delete = $this->pdo->prepare('DELETE FROM posts WHERE id = :id');
        $delete->bindValue(':id', $id, \PDO::PARAM_INT);

        // $manager = new CommentManager();  a voir avec Igal quand il a fini pour pouvoir supprimer les 
        // $manager->deleteCommentsByPostId($id);

        return $delete->execute();
    }
    public function updatePost(Post $post, bool $getArray = false)
    {
        $update = $this->db->prepare('UPDATE posts SET title = :title, content = :content, imageId = :imageId WHERE id =:id');
        $update->bindValue(':title', htmlspecialchars( $post['title']), \PDO::PARAM_STR);
        $update->bindValue(':content', nl2br(htmlspecialchars( $post['content'])), \PDO::PARAM_STR);
        $update->bindValue(':id',  $post['id'], \PDO::PARAM_INT);
        $update->bindValue(':image',  $post['image'], \PDO::PARAM_INT);

        return $update->execute() ;
    }

}
