<?php
require "../../../php/database.php";
// Terima data dari permintaan AJAX
// $data1 = $_POST['data1'];
if (!isset($_POST['data'])){
  header("Location: ../");
}
else{
  $data = $_POST['data'];
  // var_dump ($dataLogin);
  // Lakukan koneksi ke database
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $dbname = 'web_mobil';
  $conn = mysqli_connect($host, $user, $password, $dbname);
  
  // Looping melalui data dan masukkan ke database
  foreach ($data as $item) {
    $user = mysqli_real_escape_string($conn, $item['user']); // Hindari SQL injection
    $gambar = mysqli_real_escape_string($conn, $item['image']); // Hindari SQL injection
    $orderan = mysqli_real_escape_string($conn, $item['name']); // Hindari SQL injection
    $status = mysqli_real_escape_string($conn, 'Unverified'); // Hindari SQL injection
    $hargaSatuan = mysqli_real_escape_string($conn, $item['price']); // Hindari SQL injection
    $kuantitas = mysqli_real_escape_string($conn, $item['quantity']); // Hindari SQL injection
    $totalHarga = mysqli_real_escape_string($conn, $item['total']); // Hindari SQL injection
    
    $intHargaSatuan = intval($hargaSatuan);
    $intKuantitas = intval($kuantitas);  
    $intTotal = intval($totalHarga);
    
    $query = "INSERT INTO order_user (user, image_url, orderan,statusOrder, hargaSatuan, kuantitas, totalHarga) VALUES ('$user', '$gambar', '$orderan', '$status', $intHargaSatuan, $intKuantitas, $intTotal);";
    mysqli_query($conn, $query);
    // var_dump ($intTotal);

    $bayar = mysqli_real_escape_string($conn, 'Not Paid Yet'); // Hindari SQL injection
    $queryIdOrder = "SELECT id FROM order_user ORDER BY id DESC LIMIT 1";
    $arrayIdOrder = query($queryIdOrder);
    $strId = $arrayIdOrder[0]['id'];
    $intId = intval($strId);
    $query = "INSERT INTO transaksi VALUES ('', $intId, '$user', '$orderan', '$status', '$bayar');";
    // var_dump ($intId);
    mysqli_query($conn, $query);
  }
}


mysqli_close($conn);


// Tutup koneksi ke database

// Kirim respon ke klien

?>