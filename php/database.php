<?php
// Lakukan koneksi ke database
$conn = mysqli_connect("localhost","root","","web_mobil");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}



// // Ambil data dari formulir login
// $id = $_POST['id'];
// $password = $_POST['password'];

// // Query ke database untuk memeriksa keberadaan pengguna berdasarkan ID dan password
// $sql = "SELECT * FROM users WHERE id='$id' AND password='$password'";
// $result = $conn->query($sql);

// // Periksa hasil query
// if ($result->num_rows > 0) {
//     echo 'success';
// } else {
//     echo 'error';
// }

?>
