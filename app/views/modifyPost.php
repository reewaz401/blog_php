<?php 

$user_id=$_SESSION['user_id'];
var_dump($user_id);

?>

<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="./index.css">
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modify post</title>
</head>

<form action="/upDatePost" method = "post" enctype="multipart/form-data" style="border:1px solid #ccc">

<?php
    echo' <input  type="hidden" name="postId" value="'.$post['id'].'">';
    echo '<label for="title"><b>Titre</b></label>';
    echo' <input  type="text" name="title" id="title" value="'.$post['title'].'">';
    echo ('<label for="content"><b>Content</b></label><br>');
    echo' <textarea  name="content" id="content" cols="30" rows="10" placeholder="'.$post['content'].'" value="'.$post['title'].'"></textarea>  <br>  <br>  <br>';
    echo ("<label for='image'><b>Image d'illustration</b></label> <br>");
    echo(' <input type="file" name="image" id="image" accept="image/*" required>');
    ?>
   
    <button type="submit" name="but_submit">Ajouter</button>
  </div>
</form>
<body>
</body>
</html>
