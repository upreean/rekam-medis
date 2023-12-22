<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login/index.php");
    exit;
} 

require 'assets/database/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="assets/img/healthcare.png" />

    <title>REKAM MEDIS | Dashboard</title>
  </head>
  <body>
    <!-- SIDEBAR -->
  <?php require 'sidebar.php' ?> 
    <!-- SIDEBAR -->
    <!-- CONTENT -->
    <section id="content">
      <!-- NAVBAR -->
  <?php require 'navbar.php' ?> 
      <!-- NAVBAR -->

      <!-- MAIN -->
      <main class="dashboard" id="home">
        <div class="head-title">
          <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#" class="active">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#"></a>
              </li>
            </ul>
          </div>
        </div>

        <ul class="box-info">
          <li>
            <i class="bx"
              ><img src="assets/img/doctor-blue.png" width="30px"
            /></i>
            <span class="text">
              <h3><?= $doctors["COUNT(id)"]; ?></h3>
              <p>Dokter</p>
            </span>
          </li>
          <li>
            <i class="bx"
              ><img src="assets/img/patient-yellow.png" width="35px"
            /></i>
            <span class="text">
              <h3><?= $patients["COUNT(id)"];?></h3>
              <p>Pasien</p>
            </span>
          </li>
          <li>
            <i class="bx"
              ><img src="assets/img/room-orange.png" width="30px"
            /></i>
            <span class="text">
              <h3><?= $patientRooms["COUNT(id)"]; ?></h3>
              <p>Ruangan</p>
            </span>
          </li>
          <li>
            <i class="bx"
              ><img src="assets/img/medicines-purple.png" width="30px"
            /></i>
            <span class="text">
              <h3><?= $medicines["COUNT(id)"]; ?></h3>
              <p>Obat</p>
            </span>
          </li>
        </ul>
      </main>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="script.js"></script>
  </body>
</html>
