<?php 
//connet database;
$conn = mysqli_connect("localhost","root","","buku");

function query($query){
  global $conn;
  
  $result = mysqli_query($conn ,$query);
  $rows = [];
  while($row =mysqli_fetch_assoc($result) ){
    $rows[] =$row;
  }
  return $rows;
}
//tambah data 
function tambah($data){
  global $conn;

  $judul = htmlspecialchars($data["judul_buku"]);
  $penerbit = htmlspecialchars($data["penerbit"]);
  $gendre = htmlspecialchars($data["gendre"]);
  $harga = htmlspecialchars($data["harga"]);
  $gambar =upload();
  if( !$gambar){
    return false;
  }

  $query = "INSERT INTO tokobuku VALUES
            ('','$judul','$penerbit','$gendre','$harga','$gambar');
            ";
  mysqli_query($conn, $query);
  
  return mysqli_affected_rows($conn);
}
//fitur uploadd
function upload(){
  $namaFile= $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  //cek apahkah tidak ada gambar yang di upload
  if( $error === 4){
    echo "
      <script>
        alert('Anda belum memasukan gambar');
      </script>
    ";
  }
  // cek apahkah yang di upload gambar/bukan;
  $ekstensiGambarValid = ['jpg','jpeg','png'];
  $ekstensiGambar = explode('.',$namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  //cek apahkah ada string di dalam array 
  if(!in_array($ekstensiGambar ,$ekstensiGambarValid) ){
    echo "
    <script>
      alert('yang anda masukan bukan gambar');
    </script>
  ";
  return false;
  }
  //cek size gambar 1mb
  if( $ukuranFile > 100000){
    echo "
    <script>
      alert('file gambar terlalu besar uauauaw');
    </script>
  ";
  return false;
  }
  //lolos 3 pengecekan ,maka upload
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;


  move_uploaded_file($tmpName , '../img/' . $namaFileBaru);

  return $namaFileBaru;

}
//hapus data
function hapus($id){
  global $conn;
  
  mysqli_query($conn,"DELETE FROM tokobuku WHERE id =$id");

  return mysqli_affected_rows($conn);
}

//fitur ubah data;
function ubah($data){
  global $conn;

  $id =$data["id"];
  $judul_buku = htmlspecialchars($data["judul_buku"]);
  $penerbit = htmlspecialchars($data["penerbit"]);
  $gendre = htmlspecialchars($data["gendre"]);
  $harga = htmlspecialchars($data["harga"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  //cek apahkah user menganti gambar lama dengan yang baru 
  if( $_FILES['gambar']['error'] === 4){
     $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }

  $query = "UPDATE tokobuku SET
            judul_buku ='$judul_buku',
            penerbit ='$penerbit',
            gendre ='$gendre',
            harga ='$harga',
            gambar ='$gambar'
            WHERE id= $id
  ";
  mysqli_query($conn,$query);
  
  return mysqli_affected_rows($conn);
}


//fitur pencarian 
function cari($keyword){
  global $conn;

  $query ="SELECT * FROM tokobuku 
          WHERE
          judul_buku LIKE '%$keyword%' OR
          gendre LIKE '%$keyword%' OR
          penerbit LIKE '%$keyword' 
  ";
    return query($query);

}
?>