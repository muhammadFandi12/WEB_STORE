<?php 
session_start();

require "../../php/database.php";
$produk = query("SELECT * FROM produk");

if (!isset($_SESSION['user'])) {
    header("Location:../../Login");
    exit;
}

// tampung di array dulu
$data = array();

// Looping untuk memasukkan data ke dalam array
foreach ($produk as $produk) {
    $data[] = $produk;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery/node_modules/jquery/dist/jquery.min.js"></script>
    <title>BMW - Shopping Cart</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body class="">
    <div class="container">
        <header>
            <h1>Your Shopping Cart</h1>
            <div class="shopping">
                <img src="image/shopping.svg">
                <span class="quantity">0</span>
            </div>
            <div class="containerTombolStatus">
                <button onclick="userDashboard()" class="tombolStatus">
                    <span class="button_top"> Status
                    </span>
                </button>
            </div>
        </header>

        <div class="tampungUser"><?= $_SESSION["userLogin"] ?></div>

        <div class="list">
            <?php $i = 0; ?>
            <?php while($i < count($data)){ ?>
                <div class="item">
                    <img class="image" src="image/<?= $data[$i]["image_url"]; ?>" alt="">
                    <div class="title"><?= $data[$i]["model"]; ?></div>
                    <div class="year"><?= $data[$i]["year"]; ?></div>
                    <div class="price"><?= $data[$i]["price"]; ?></div>
                    <button class="tombolAddCart" onclick="addToCard(<?= $i; ?>)">Add To Cart</button>
                </div>
            <?php 
                $i++;
                };
            ?>
        </div>
    </div>
    <div class="card">
        <h1>Cart</h1>
        <ul class="listCard">
            <li class="cart">
            </li>
        </ul>
        <div class="checkOut">
            <button onclick="pushData()" class="tombol-push"><div class="total">Rp. 0</div></button>
            <div class="closeShopping">Close</div>
        </div>
    </div>

    <script src="js/app.js"></script>
</body>
</html>
