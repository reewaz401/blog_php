
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="./index.css">
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
</head>

<form action="/login" method = "post" style="border:1px solid #ccc">

  <div class="container">
    <h1>Sign In</h1>
    <!-- <?php
    if(!empty($_GET['message'])) {
      $mess =$_GET['message'];
      echo "<div class='alert'>";
      echo "<strong>Warning!</strong> $mess";
      echo '</div>';
    }
    ?> -->
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="username"><b>User name</b></label>
    <input type="text" placeholder="Enter user name" name="username" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

  <br><br>

    <button type="submit" name="but_submit">Sign In</button>
  
  </div>
</form>
<body>
</body>
</html>
