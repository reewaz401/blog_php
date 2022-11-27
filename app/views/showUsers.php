<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($users as $user) {
            echo '<form action="/deleteUser/" method = "post" style="border:1px solid #ccc">';
            $id = $user->getId();
            $username = $user->getUsername();
            $email = $user->getEmail();
            echo "<tr>";
            echo "<th scope='row'>$id</th>";
            echo "<td>$username</td>";
            echo "<td>$email</td>";
            echo '<td>';
            echo "<input type='text' hidden placeholder='Enter Password' name='id' value= $id>";
            echo "<button type='submit' style='background-color:red; color:white;' name='but_submit'>Delete</button></td>";
            echo "</tr>";
            echo "</form>";
        }
          
          ?>
         
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
