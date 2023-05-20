<?php 
  require "../funtions/functions.php";

  //cek apahkah submit sudah di klick atau belum
  if( isset($_POST["submit"]) ){
    if( tambah($_POST) > 0){
      echo "
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = 'index.php';
        </script>
      ";
    }else {
      echo "
        <script>
          alert('data gagal ditambahkan');
          document.location.href = 'index.php';
        </script>
      ";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/tambah.css">
  <title>Data Buku</title>
</head>
<body>
  <h1>Data Buku!</h1>

  <form action="" method="post" class="form" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <label for="judul_buku" name="judul_buku" >Judul Buku</label>
        <input type="text" name="judul_buku" id="judul_buku" required>
      </div>
      <div class="col">
        <label for="penerbit" name="penerbit" >Penerbit :</label>
        <input type="text" name="penerbit" id="penerbit" required>
      </div>
      <div class="col">
        <label for="gendre" name="gendre" >Gendre :</label>
        <input type="text" name="gendre" id="gendre" required>
      </div>
      <div class="col">
        <label for="harga" name="harga" >Harga Buku :</label>
        <input type="text" name="harga" id="harga" required>
      </div>
      <div class="col">
        <label for="gambar" name="gambar" >Gambar :</label>
        <input type="file" name="gambar">
      </div>
    </div>
    <div class="col-btn">
      <button type="submit" name="submit" class="btn">Tambah Data</button>
    </div>
  </form>
  
</body>
</html>