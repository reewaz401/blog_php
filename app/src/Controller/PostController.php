<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;

class PostController extends AbstractController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function home()
    {
        $manger = new PostManager(new PDOFactory());
        $posts = $manger->getAllPosts();

        $this->render("home.php", [
            "posts" => $posts,
            "trucs" => "je suis une string",
            "machin" => 42
        ], "Tous les posts");
    }
   
    /**
     * @param $id
     * @param $truc
     * @param $machin
     * @return void
     */
    #[Route('/addPost', name: "addPost", methods: ["GET"])]
    public function addPost()
    {
        $this->render("addPost.php", [

        ], "Add post");
    }
}
