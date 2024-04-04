<?php

// Include file koneksi ke database
session_start();
require "functions/functions.php";

// Cek jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui form
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Data untuk disimpan dalam array
    $data = [
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'password2' => $password2
    ];

    // Panggil fungsi signup untuk melakukan proses pendaftaran
    $result = signup($data);

    // Jika pendaftaran berhasil
    if ($result) {
        echo "<script>
                alert('Registration successful!');
                window.location.href = 'index.php';
              </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/login.css">
    <title>Registration</title>
</head>
<body>
<main>
  <div class="form-container">
    <p class="title">Registration Form</p>
    <form class="form" action="regis.php" method="post">
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="password2">Confirm Password</label>
        <input type="password" name="password2" id="password2" required>
      </div>
      <button type="submit" class="sign">Register</button>
    </form>
    <p class="signup">Already have an account?
      <a rel="noopener noreferrer" href="index.php" class="">Sign in</a>
    </p>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

