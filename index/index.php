  <?php
  session_start();

  if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  } 
  include "../functions/functions.php";

  $buku = query("SELECT * FROM `tokobuku` ");

  //pencarian
  if( isset($_POST['cari']) ){
    $buku = cari($_POST['keyword']);
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Toko Buku</title>
  </head>
  <body>
    <h1>Toko Buku Berkah Barokah Azab</h1>

    <div class="link" style="font-size: 2rem;" >
      <a href="tambah.php">Tambah Data Buku!</a>
    </div>
    <br><br>


      <form action="" method="post">
      <input type="search" name="keyword" id="keyword" size="70" autofocus autocomplete="off" placeholder="Masukan Pencarian....">
      <button type="submit" name="cari" id="tombol-cari" >cari</button>
      <input type="image" src="../img/loader.gif" class="loader">
    </form>
    <br><br>
    <div id="container">
    <table border="1" cellspacing="0" cellpadding="10" class="table">

      <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>Judul</th>
        <th>Penerbit</th>
        <th>Gendre</th>
        <th>Harga</th>
        <th>Gambar</th>
      </tr>
      <?php $i =1; ?>
      <?php foreach ($buku as $row ) :?>
        <tr>
          <td><?= $i;  ?></td>
        <td>
          <a href="ubah.php?id=<?= $row["id"];  ?>">Ubah |</a>
          <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
        </td>
        <td> <?= $row["judul_buku"];  ?>  </td>
        <td> <?= $row["penerbit"];  ?></td>
        <td><?= $row["gendre"];  ?></td>
        <td><?= $row["harga"];  ?></td>
        <td><img src="../img/<?= $row["gambar"];  ?>" class="tr-td-img"></td>
      </tr>
      <?php  $i++;?>
      <?php  endforeach;?>
    </table>
    </div>

        <br><br>
    <div class="link">
      <a href="logout.php" style="font-size: 2rem;" >Log Out</a>
    </div>
    <br><br>
    <script src="../js/jquery-3.7.0min.js"></script>
    <script src="../js/script.js"></script>
  </body>
  </html>