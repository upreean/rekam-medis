<?php 
// koneksi data base
require '../assets/database/functions-doctor.php';

$doctor = query("SELECT * FROM dokter");

// tombol cari ditekan
if (isset($_POST["search"])) {
  $doctor = searchDoctor($_POST["keyword"]);
}

// jumlah dokter
$doctors = query("SELECT COUNT(id) FROM dokter")[0];

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
    <!-- My CSS -->
   <link rel="stylesheet" href="../style.css" />

    <link rel="icon" href="../assets/img/healthcare.png" />

    <title>REKAM MEDIS | Dokter</title>
  </head>
  <body>
    <!-- SIDEBAR -->
    <?php require "sidebar.php" ?>
    <!-- SIDEBAR -->
    <!-- CONTENT -->
    <section id="content">
    <!-- NAVBAR -->
    <?php require "navbar.php" ?>
    <!-- NAVBAR -->
    
      <!-- DOCTOR -->
      <div class="doctor" id="doctor">
        <div class="head-title">
          <div class="left">
            <h1>Dokter</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Dokter</a>
              </li>
            </ul>
          </div>
        </div>

        <ul class="box-info">
          <li class="doctor">
            <i class="bx"
              ><img src="../assets/img/doctor-blue.png" width="30px"
            /></i>
            <span class="text">
              <h3><?= $doctors["COUNT(id)"]; ?></h3>
              <p>Dokter</p>
            </span>
          </li>
        </ul>

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Data Dokter</h3>
              <form action="" method="post">
              <input
                type="search"
                name="keyword"
                placeholder="Search..."
                class="search-data"
                margin-right="5px"
                autocomplete="off"
                autofocus
              />
              <button type="submit" name="search" style="border: none; background-color: transparent;">
                <i class="bx bx-search"></i>
              </button>
              
              <a href="#" onclick="addDoctor()">
                <!-- <a href="#" class="btn-addDokter"> -->
                <i class="bx bx-plus" style="color: black;"></i>
                <!-- <span class="text">Tambah Dokter</span> -->
              </a>
              </form>
              
            </div>
            <table>
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Spesialis</th>
                  <th>No. Hp</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($doctor as $row) : ?>
                <tr>
                  <td>
                    <img src="img/<?= $row["gambar"] ?>" />
                    <p><?= $row["nama"] ?></p>
                  </td>
                  <td><?= $row["nip"] ?></td>
                  <td>
                    <p><?= $row["spesialis"] ?></p>
                  </td>
                  <td><?= $row["noHp"] ?></td>
                  <td>
                    <a href="editDoctor.php?id=<?= $row["id"] ?>">
                      <i class="bx bxs-edit" style="color: black;"></i>
                    </a>
                    |
                    <a href="deleteDoctor.php?id=<?= $row["id"] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?');">
                      <i class="bx bxs-trash" style="color: black;"></i>
                    </a>
                  </td>
                </tr>
               <?php  endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- end File management -->
    </section>
    <!-- CONTENT -->
    <script src="js/doctor.js"></script>
  </body>
</html>
