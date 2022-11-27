
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="./index.css">
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modify</title>
</head>

<form action="/modifyUser" method = "post" style="border:1px solid #ccc">

  <div class="container">
    <h1>Modify</h1>
    <!-- <?php
    if(!empty($_GET['message'])) {
      $mess =$_GET['message'];
      echo "<div class='alert'>";
      echo "<strong>Warning!</strong> $mess";
      echo '</div>';
    }
    ?> -->
    <hr>
    <label for="username"><b>User name</b></label>
    <?php

    $username= $user->getUsername();
    $email= $user->getEmail();
    $password= $user->getPassword();
    $role= $user->getRoles();
    echo "<input type='text' placeholder=$username name='username' value=$username required>";
    echo "<label for='email'><b>Email</b></label>";
    echo "<input type='text' placeholder=$email name='email' value =$email required>";
    echo "<label for='psw'><b>Password</b></label>";
    echo "<input type='password' placeholder=$password value=$password name='psw' required>";
    echo "<label for='psw-repeat'><b>Repeat Password</b></label>";
    echo " <input type='password' placeholder=$password value =$password name='psw-repeat' required>";
    echo "<br><br>";
    echo "<label for='gender'>Gender:</label>";
    echo "<select name='gender' id='gender'>";
    echo "<option value='M'>Male</option>";
    echo "<option value='F'>Female</option>";
    echo "</select>";
    echo "<label for='roles'>Who are you:</label>";
    echo "<select name='roles' id='roles'>";
    echo "<option value='1'>User</option>";
    echo "<option value='0'>Admin</option>";
    echo "</select>";
    echo "<br><br>";
    ?>
    <!-- <select name="page" onchange="window.location=this.value">
    <option value="/path/to/page1.php">Page 1</option>
    <option value="/path/to/page2.php">Page 2</option>
    <option value="/path/to/page3.php">Page 3</option>
    </select> -->
    
    <!-- <div class="clearfix"> -->
    <button type="submit" name="but_submit">Update</button>
    <!-- </div> -->
  
  </div>
</form>
<body>
</body>
</html>
