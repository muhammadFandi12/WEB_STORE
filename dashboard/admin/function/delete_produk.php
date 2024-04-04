<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "web_mobil");

// Cek koneksi
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Mengambil data yang dikirim dari form
$id = $_POST['id_produk'];

// Query untuk mengubah data di MySQL
$sql = "DELETE FROM produk WHERE id_produk = $id";

// Eksekusi query
if (mysqli_query($conn, $sql)) {
//   echo "Data berhasil diubah.";
    header("Location:../index.php");
} 
else {
  echo "Error: " . mysqli_error($conn);
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
