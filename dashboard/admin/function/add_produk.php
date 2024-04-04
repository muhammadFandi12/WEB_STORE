<?php
$data = $_POST['data'];

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'web_mobil';
$conn = mysqli_connect($host, $user, $password, $dbname);

foreach ($data as $item) {
    $model = mysqli_real_escape_string($conn, $item['modelCar']); 
    $year = mysqli_real_escape_string($conn, $item['yearCar']); 
    $price = mysqli_real_escape_string($conn, $item['priceCar']); 
    $image_url = mysqli_real_escape_string($conn, $item['image_urlCar']); 
    
    $intprice = intval($price);

    $query = "INSERT INTO produk VALUES ('','$model','$year', $intprice, '$image_url');";
    mysqli_query($conn, $query);
}
mysqli_close($conn);
?>