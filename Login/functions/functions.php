<?php 

$conn = mysqli_connect("localhost","root","","web_mobil");


// function query($query){
//     global $conn;
//     $result = mysqli_query($conn,$query);
// }


// SIGNUP
function signup($data){
    global $conn;
    $email = $data['email'];
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    // $role = ($conn, $data['role']);

    // cek email sama
    $result_email = mysqli_query($conn, "SELECT email FROM data_user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result_email)){
        echo "<script>
                alert('Email Already Exist!');
              </script>";
        return false;
    }

    // cek user sama
    $result_user = mysqli_query($conn, "SELECT username FROM data_user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result_user)){
        echo "<script>
                alert('Username Already Taken!');
              </script>";
        return false;
    }
    
    // cek konfir password
    if ($password !== $password2){
        echo "<script>
                alert('Confirm Password Invalid!');
              </script>"; 
        
        return false;
    }

    // enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user
    mysqli_query ($conn, "INSERT INTO data_user VALUES ('','$email', '$username', '$password','user')");
    return mysqli_affected_rows($conn);

}

// LOGIN


?>