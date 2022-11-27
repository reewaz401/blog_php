<?php /** @var App\Entity\User $user */ 

?>

<?php
/** @var App\Entity\Post[] $posts */
// foreach ($posts as $post) {
//     echo $post->getContent();
// }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    <header>
    <h1 style="text-align: center;">Blog</h1>
        <nav>
            <ul style="display: flex; list-style: none; justify-content: space-around;">
                 <li><a href="/">Home</a></li>
                <li><a href="/addpost">Nouveau post</a></li>
                <li><a href="/signin">sign in</a></li>
                <li><a href="/signup">sign up</a></li>
                <li><a href="/logout">logout</a></li>
           
            </ul>
        </nav>
    </header>
    <main>


    
        <?php 
        foreach ($posts as $post) {
                echo ("<div style='text-align: center;'><h2 >".$post['title']."</h2><p>").$post['content'].'</p><img src="/src/public_image/'.$post['image'].'">';
                if ($post['user_id']== $_SESSION['user_id']||$_SESSION['roles']==0) {
                    echo ("<form method='post' action='/deletePost'> <button type='submit' class='btn btn-danger btn-sm' name='id' value='".$post['id']."'>X</button> </form>");
                    // echo ("<form method='post' action='./modifyPost.php>' <button type='submit' class='btn btn-secondary btn-sm' name='id' value='".$post['id']."'>Modifier</button></form></div>");
                    echo ('<form action="post" action="./modifyPost.php"><button type="submit" class="btn btn-secondary btn-sm" name="id" value="'.$post["id"].'>Modifier</button></form></div>');
                }
                // echo $post['title'];

         }
        
        ?>

    </main>
  
</body>
</html>