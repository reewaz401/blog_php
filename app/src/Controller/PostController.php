<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;
use App\Entity\Post;
// session_start();
class PostController extends AbstractController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function home()
    {
        $home = new PostManager(new PDOFactory());
        $posts = $home->getAllPosts();

        $this->render("home.php", [
            "posts" => $posts,
        ], "Tous les posts");
    }

    #[Route('/addPost', name: "addPost", methods: ["POST"])]
    public function newPost()
    {
        $post = new Post();
        $post->setTitle($_POST["title"]);
        $post->setContent($_POST["content"]);
        $post->setUser_id($_POST["user_id"]);
       
        $name_img=$_FILES['image']['name'];
        $tmp_image=$_FILES['image']['tmp_name'];
        $destination=$_SERVER['DOCUMENT_ROOT'].'/src/public_image/'.$name_img;
        move_uploaded_file($tmp_image,$destination);
        $post->setImage($name_img);

        $postManager = new PostManager(new PDOFactory());
        $userMang = $postManager->addPost($post);
        $this->render("home.php", [
          
        ], "add post");
    }
    #[Route('/addpost', name: "addPost", methods: ["GET"])]
    public function addPost()
    {
        $this->render("addPost.php", [

        ], "Add post");
    }
    #[Route('/deletePost', name: "deletPost", methods: ["POST"])]
    public function deletePost()
    {
        $post = new Post();
        $id=$_POST['id'];
        $id=(int) $id;

        $post->setId($id);
     
        $postManager = new PostManager(new PDOFactory());
        $userMang = $postManager->deletePost($id);
        $this->render("home.php", [
          
        ], "delete post");
    }
    #[Route('/modifyPost', name: "modifyPost", methods: ["POST"])]
    public function modifyPost()
    {
        $post = new Post();
        $id=$_POST['id'];
        $id=(int) $id;

        $post->setId($id);
        $modifyPost = new PostManager(new PDOFactory());
        $postOld = $modifyPost->getPostById($id);
        $this->render("modifyPost.php", [
            "post" => $postOld,
          
        ], "modify post");
    }
    #[Route('/upDatePost', name: "upDate", methods: ["POST"])]
    public function upDate()
    {
        $post = new Post();
        $post->setTitle($_POST["title"]);
        $post->setContent($_POST["content"]);
        $post->setId($_POST["postId"]);
       
        $name_img=$_FILES['image']['name'];
        $tmp_image=$_FILES['image']['tmp_name'];
        $destination=$_SERVER['DOCUMENT_ROOT'].'/src/public_image/'.$name_img;
        move_uploaded_file($tmp_image,$destination);
        $post->setImage($name_img);

        $postManager = new PostManager(new PDOFactory());
        $userMang = $postManager->updatePost($post);
        $this->render("home.php", [
          
        ], "update post");
    }
   
  
   
}
