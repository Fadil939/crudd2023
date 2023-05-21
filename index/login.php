<?php 
include "../functions/functions.php";

if( isset($_POST["login"]) ){

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result =mysqli_query($conn ,"SELECT * FROM user WHERE username = '$username'");

  //cek username
  if( mysqli_num_rows($result) === 1){

    //cek password
    $row = mysqli_fetch_assoc($result);
    if( password_verify($password,$row["password"]));
      header("Location: index.php");
      exit;    
  }
  $error = true;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/registrasi.css">
</head>
<body>
  <h1>Login</h1>

  <?php if( isset($error) ) :?>
      <p style="color: red; font-style: italic;">Username / Password salah</p>
  <?php endif;?>
  <form action="" method="post">
    <div class="row">
      <div class="col">
        <label for="text" name="username" class="from-label" >Username  </label>
       <input type="text" name="username" id="username"  placeholder="masukan username" >
      </div>
      <div class="col">
        <label for="text" name="password" class="from-label" >Password  </label>         
        <input type="password" name="password" id="password" placeholder="masukan password" >
      </div>
    </div>
    <div class="col-btn">
      <button type="submit" name="login" class="btn" >Login</button>
    </div>
  </form>
</body>
</html>