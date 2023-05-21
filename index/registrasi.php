<?php 
include "../functions/functions.php";


if( isset($_POST["register"]) ){

  if(registrasi($_POST) > 0 ){
      echo "
          <script>
            alert('akun baru sudah dibuat');
          </script>
        ";
  } else {
    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <link rel="stylesheet" href="../css/registrasi.css">
</head>
<body>
  <h1>Registrasi</h1>
  
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
      <div class="col">
        <label for="text" name="password2" class="from-label"  >Confirm password </label>
        <input type="password" name="password2" id="password2" placeholder="Confirm password" >
      </div>
    </div>
    <div class="col-btn">
      <button type="submit" name="register" class="btn" >Submit</button>
    </div>
  </form>
</body>
</html>