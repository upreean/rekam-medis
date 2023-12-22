<?php 
require '../assets/database/functions-user.php';

    if (isset($_POST["register"])) {
        if (register($_POST) > 0) {
            echo "<script>
                alert('Register Berhasil')
            </script>";

            header("Location: login.php");
            exit;
        }else {
            echo mysqli_error($connection);
        }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Rekam Medis | Register</title>
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
        <h1>Register</h1>

        <div class="form">
          <form action="" method="post">
            <label for="username">Username:</label>
            <input
              type="text"
              id="username"
              name="username"
              placeholder="Masukkan Username"
              required
            /><label for="email">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Masukkan Email"
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

            <label for="confirm-password">Konfirmasi Password:</label>
            <input
              type="password"
              id="confirm-password"
              name="confirm-password"
              placeholder="Masukkan Password"
              required
            />

            <a href="index.php" class="register-link"
              ><span>Sudah Punya Akun?</span> Login</a
            >

            <button type="submit" name="register">Register</button>
          </form>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
