<?php 
  require "../funtions/functions.php";

  $id = $_GET["id"];

  $book =query("SELECT * FROM tokobuku WHERE id = $id")[0];

  //cek apahkah submit sudah di klick atau belum
  if( isset($_POST["submit"]) ){

    if( ubah($_POST) > 0){
      echo "
        <script>
          alert('data berhasil diubah');
          document.location.href = 'index.php';
        </script>
      ";
    }else {
      echo "
        <script>
          alert('data gagal diubah');
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
  <h1>Update Data Buku!</h1>
<!-- perhatikan jika value" phpp" jika ada spasi di awal akan berpengaruh ketika kita mengklick tombol ubah akan di tambhkan spasi juga yang membuat gw kepusinga anjinh
 -->
  <form action="" method="post" class="form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $book['id']  ?>">
    <input type="hidden" name="gambarLama" value="<?= $book['gambar']  ?>">
    <div class="row">
      <div class="col">
        <label for="judul_buku" name="judul_buku" >Judul Buku</label>
        <input type="text" name="judul_buku" id="judul_buku" required
        value= "<?= $book['judul_buku']; ?>">
      </div>
      <div class="col">
        <label for="penerbit" name="penerbit" >Penerbit :</label>
        <input type="text" name="penerbit" id="penerbit" required
        value="<?= $book['penerbit'];  ?>">
      </div>
      <div class="col">
        <label for="gendre" name="gendre" >Gendre :</label>
        <input type="text" name="gendre" id="gendre" required
        value="<?= $book['gendre'];  ?>">
      </div>
      <div class="col">
        <label for="harga" name="harga" >Harga Buku :</label>
        <input type="text" name="harga" id="harga" required
        value="<?= $book['harga'];  ?>">
      </div>
      <div class="col">
            <label for="gambar" name="gambar" class="label-from" >Gambar :</label> <br> 
            <img src="../img/<?= $book['gambar']  ?>" width="100"><br>
            <input type="file" name="gambar" id="gambar" ><br>
        </div>
    </div>
    <div class="col-btn">
      <button type="submit" name="submit" class="btn">Ubah Data</button>
    </div>
  </form>
  
</body>
</html>