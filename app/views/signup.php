
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="./index.css">
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>

<form action="/registerUser" method = "post" style="border:1px solid #ccc">

  <div class="container">
    <h1>Sign Up</h1>
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
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <br><br>
    <label for="gender">Gender:</label>
  <select name="gender" id="gender">
    <option value="M">Male</option>
    <option value="F">Female</option>
  </select>
  <label for="roles">Who are you:</label>
  <select name="roles" id="roles">
    <option value="1">User</option>
    <option value="0">Admin</option>
  </select>
  <br><br>
    <!-- <select name="page" onchange="window.location=this.value">
    <option value="/path/to/page1.php">Page 1</option>
    <option value="/path/to/page2.php">Page 2</option>
    <option value="/path/to/page3.php">Page 3</option>
    </select> -->
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <!-- <div class="clearfix"> -->
    <button type="submit" name="but_submit">Create</button>
    <!-- </div> -->
  
  </div>
</form>
<body>
</body>
</html>
