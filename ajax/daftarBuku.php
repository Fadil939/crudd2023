<?php
 
include "../functions/functions.php";
$keyword =$_GET["keyword"];

$query ="SELECT * FROM tokobuku 
          WHERE
          judul_buku LIKE '%$keyword%' OR
          gendre LIKE '%$keyword%' OR
          penerbit LIKE '%$keyword' 
        ";;

$dftbuku =query($query);
?>
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
<?php foreach ($dftbuku as $row ) :?>
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