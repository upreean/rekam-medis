<?php 
session_start();
require '../assets/database/functions-user.php';

// cek cookie
if (isset($_COOKIE["id"]) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($connection, "SELECT username FROM users WHERE id= '$id'");
    $row = mysqli_fetch_assoc($result);
       
    // cek cookie dan username
    if ($key === hash('whirlpool', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

    $result = mysqli_query($connection, "SELECT * FROM users WHERE username= '$username'");
    
    // cek username
    // cek apakah user sudah ada atau belum
    if (mysqli_num_rows($result) === 1) {
       
        // cek password
        $row = mysqli_fetch_assoc($result);
        // var_dump($row["id"]); die;
       if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            // set cookie
            setcookie('id', $row['id'], time()+3600);
            setcookie('key', hash('whirlpool', $row['username']), time()+3600);

            header("Location: ../index.php");
            exit;
       } 
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rekam Medis | Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="../assets/img/healthcare.png" />
  </head>
  <body>
    <div class="logo">
      <img src="assets/img/healthcare.png" class="logo-img" />
      <h1 class="logo-text">REKAM MEDIS</h1>
    </div>
    <div class="contain">
      <div class="container">
        <h1>Login</h1>

        <div class="form">
        <?php if (isset($error)) {
           echo "<script>alert('username atau password salah')</script>";
        } ?>
          <form action="" method="post">
            <label for="username">Username:</label>
            <input
              type="text"
              id="username"
              name="username"
              placeholder="Masukkan Username"
              required
            />

            <label for="password">Password:</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Masukkan Password"
              required
            />

            <a href="register.php" class="register-link"
              ><span>Belum Punya Akun?</span> Register</a
            >

            <button type="submit" name="login">Login</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
