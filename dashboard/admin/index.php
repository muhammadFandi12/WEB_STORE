<?php 
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location:../../Login");
    exit;
}




require "../../php/database.php";

$order_user = query("SELECT * FROM produk;");

// tampung di array dulu
$data = array();

// Looping untuk memasukkan data ke dalam array
foreach ($order_user as $order_users) {
    $data[] = $order_users;
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>BMW - Admin Dashboard</title>
  <script src="../user/js/jquery/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="app-container">
  <div class="sidebar">
    <div class="sidebar-header">
      <div class="app-icon">
        <a style="padding-top:0px;" class="logo-dashboard-admin" href="#"><img src="../../images/car_detail/bmw_logo.png" alt="BMW" /></a>
      </div>
    </div>
    <ul class="sidebar-list">
      <li class="sidebar-list-item">
        </a> -->
      </li>
      <li class="sidebar-list-item active">
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <span>Order List</span>
        </a>
      </li>
    </ul>
    <div class="account-info">
      <div class="account-info-name"><?= $_SESSION["adminLogin"] ?></div>
      <button class="account-info-more">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
      </button>
    </div>
  </div>
  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Admin Dashboard</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      <form action="function/logout.php" method="post">
        <input type="hidden" name="">
        <button type="submit" class="app-content-headerButton">Logout</button>
      </form>
    </div>
    <div class="app-content-actions">
      <!-- Modal  -->
      <!-- Tombol untuk membuka modal -->
      <button id="open-modal-btn" class="app-content-headerButton">Add Menu</button>

      <!-- Modal Form -->
      <div class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Add Car Form</h2>
          <form action="function/add_produk.php" method="post" id="contact-form" enctype="multipart/form-data">
            <label for="name">New model name:</label>
            <input type="text" id="CarModel" name="CarModel" required>
            
            <label for="year">New Year:</label>
            <input type="text" id="CarYear" name="CarYear" required>

            <label for="price">Price:</label>
            <input type="number" id="CarPrice" name="CarPrice" required>

            <label for="subject">Image:</label>
            <input type="file" id="CarImage" name="CarImage" required>
            <div class="containerTombolKirimModal">
              <button onclick="addMenu();" class="tombolKirimModal" name="tambahMenu" type="submit">Add Menu</button>
            </div>
          </form>
        </div>
      </div>

      <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper">
          <div class="filter-menu">
            <label>Category</label>
            <select>
              <option>All Categories</option>
              <option>Furniture</option>                     <option>Decoration</option>
              <option>Kitchen</option>
              <option>Bathroom</option>
            </select>
            <label>Status</label>
            <select>
              <option>All Status</option>
              <option>Active</option>
              <option>Disabled</option>
            </select>
            <div class="filter-menu-buttons">
              <button class="filter-button reset">
                Reset
              </button>
              <button class="filter-button apply">
                Apply
              </button>
            </div>
          </div>
        </div>
          <button class="action-button list active" title="List View">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
          </button>
          <button class="action-button grid" title="Grid View">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
          </button>
      </div>
    </div>

    <div class="products-area-wrapper tableView">
      <div class="products-header">
        <div class="product-cell image">
          Menu
        </div>
        <div class="product-cell year">
          Year
        </div>
        <div class="product-cell category">
          Price
        </div>
        <div class="product-cell price">Delete Produk ?</div>
      </div>
      <?php $i = 0; ?>
      <?php while($i < count($data)){?>
        <div class="products-row">
          <button class="cell-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
          </button>
          <div class="product-cell image">
            <img src="../user/image/<?=$data[$i]['image_url'] ?>" alt="product">
            <span><?= $data[$i]['model']; ?></span>
            </div>
            <div class="product-cell year"><span class="cell-label">Year:</span><?= $data[$i]['year']; ?></div>
          <div class="product-cell sales"><span class="cell-label">Price: </span>Rp. <?= $data[$i]['price']; ?></div>
          <div class="product-cell price"><span class="cell-label">Delete Produk?:</span>
            <form action="function/delete_produk.php" method="post">
              <input type="hidden" name="id_produk" value="<?= $data[$i]['id_produk'] ?>">
              <button type='submit' class="verified-btn">Delete</button>
            </form>
          </div>
        </div>
      <?php 
        $i++;
        }
      ?>
    </div>
  </div>
</div>
<!-- partial -->



<script src="script.js"></script>
</body>
</html>