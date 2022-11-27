<?php 
session_start();
$user_id=$_SESSION['user_id'];

?>

<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="./index.css">
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add post</title>
</head>

<form action="/addPost" method = "post" style="border:1px solid #ccc">


    <input hidden type="text" name="user_id" value=<?php $user_id?> required>
    <label for="title"><b>Titre</b></label>
    <input type="text" placeholder="Titre" id="title" name="title" required>

    <label for="content"><b>Content</b></label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>

    <label for="image"><b>Image d'illustration</b></label>
    <input type="file" name="image" id="image" required>



    <button type="submit" name="but_submit">Ajouter</button>
  </div>
</form>
<body>
</body>
</html>
