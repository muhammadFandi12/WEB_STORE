<?php 
session_start();
if (!isset($_POST['submit'])){
    $_SESSION["sorts"] = true;
    $_SESSION["sort"] = "SELECT * FROM order_user;";
    // echo $_SESSION["sort"];
    // echo $_SESSION["sorts"];
    header("Location: ../");
}

if ($_POST['kolom'] != 0){
    $isi = $_POST['kolom'];
    $_SESSION["sort"] = "SELECT * FROM order_user ORDER BY $isi ASC;";
    header("Location: ../");
    // echo $_SESSION["sort"];
}

if($_POST["keyword"] != 0){
    $cari = $_POST["keyword"];
    $_SESSION["sort"] = "SELECT * FROM order_user WHERE user LIKE '%$cari%' OR
                            orderan LIKE '%$cari%' OR
                            statusOrder LIKE '$cari%' OR
                            hargaSatuan LIKE '%$cari%' OR
                            kuantitas LIKE '%$cari%' OR
                            totalHarga LIKE '%$cari%' 
                            ;";
    header("Location:../");
}
 
?>