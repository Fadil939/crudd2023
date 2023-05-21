<?php 
session_start();
include "../functions/functions.php";

if( isset($_COOKIE["id"]) && isset($_COOKIE['key']) ){
  $id = $_COOKIE["id"];
  $key =$_COOKIE["key"];

  //ambil username  berdasarkan id
  $result =mysqli_query($conn,"SELECT username FROM user WHERE id ='$id'");

  $row =mysqli_fetch_assoc($result);

  //cek cookie dengan username
  if( $key === hash('sha256',$row["username"]) ){
      $_SESSION['login'] = true;
  }
}

if( isset($_SESSION["login"])){
  header("Location: index.php");
  exit;
}


if( isset($_POST["login"]) ){

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result =mysqli_query($conn ,"SELECT * FROM user WHERE username = '$username'");

    //cek username
  if( mysqli_num_rows($result) === 1){

    //cek password
    $row = mysqli_fetch_assoc($result);
    if( password_verify($password,$row["password"]));
      //cek session 
      $_SESSION["login"] = true;
      //cek cookie
      if( isset($_POST["rememberme"]) ){
        //buat cookie
        setcookie('id',$row["id"], time() + 120);
        setcookie('key' ,hash('sha256' ,$row["username"]),time()+ 120);
      }
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
  <link rel="stylesheet" href="../css/index.css">
</head>
<body>
  <h1>Login</h1>
  <div class="link">
    <a href="registrasi.php">Registrasi Data Baru Disini!</a>
  </div>

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
      <br>
      <div class="col">
        <label for="text" name="rememberme" class="from-label" >Remember Me  </label>         
        <input type="checkbox" name="rememberme" id="rememberme"  >
      </div>
    </div>
    <div class="col-btn">
      <button type="submit" name="login" class="btn" >Login</button>
    </div>
  </form>
</body>
</html>