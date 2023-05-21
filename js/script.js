// //ambil data yang di butuhkan
// var keyword = document.getElementById("keyword");
// var tombolCari = document.getElementById("tombol-cari");
// var container = document.getElementById("container");

// //tambahkan event ketika keyword di tulis
// keyword.addEventListener("keyup", function () {
//   //buat object ajax
//   var xhr = new XMLHttpRequest();

//   //cek kesiapan ajax
//   xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       container.innerHTML = xhr.responseText;
//     }
//   };
//   //eksekusi ajax
//   xhr.open("GET", "../ajax/daftarbuku.php?keyword=" + keyword.value, true);
//   xhr.send();
// });

//sakti bet framwork
$(document).ready(function () {
  //hapus tombol cari
  $("#tombol-cari").hide();
  // event ketika keyword di tulis
  $("#keyword").on("keyup", function () {
    $("#container").load("../ajax/daftarbuku.php?keyword=" + $("#keyword").val());
  });
});
