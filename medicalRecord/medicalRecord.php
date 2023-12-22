<?php 
// koneksi data base
require '../assets/database/functions-medicalRecord.php';

$medicalRecord = query("SELECT * FROM rekam_medis");

// tombol cari ditekan
if (isset($_POST["search"])) {
  $medicalRecord = searchMedicalRecord($_POST["keyword"]);
}

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

    <title>REKAM MEDIS | Rekam Medis</title>
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

      <!-- Medical Record -->
      <div class="medical-record" id="medical-record">
        <div class="head-title">
          <div class="left">
            <h1>Rekam Medis</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Rekam Medis</a>
              </li>
            </ul>
          </div>
          <a href="export.php" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download PDF</span>
          </a>
        </div>

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Rekam Medis</h3>
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
              
              <a href="#" onclick="addMedicalRecord()">
                <i class="bx bx-plus" style="color: black;"></i>
              </a>
              </form>
            </div>
            <table>
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal Masuk</th>
                  <th>Nama Pasien</th>
                  <th>Diagnosis</th>
                  <th>Nama Obat</th>
                  <th>Dokter</th>
                  <th>Ruangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <!-- <tr>
                  <td>1</td>
                  <td>02-02-2023</td>
                  <td>Megawati</td>
                  <td>Gila Kekuasaan</td>
                  <td>Acarbose</td>
                  <td>Bill Gates</td>
                  <td>Melati 02</td>
                  <td>
                    <a href="">
                      <i class="bx bxs-edit"></i>
                    </a>
                    |
                    <a href="">
                      <i class="bx bxs-trash"></i>
                    </a>
                  </td> -->
                  <?php $i = 1; ?>
                  <?php foreach ($medicalRecord as $row) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $row["tanggal_masuk"] ?></td>
                  <td><?= $row["nama_pasien"] ?></td>
                  <td><?= $row["diagnosis"] ?></td>
                  <td><?= $row["nama_obat"] ?></td>
                  <td><?= $row["nama_dokter"] ?></td>
                  <td><?= $row["nama_ruangan"] ?></td>
                  <td>
                    <a href="editMedicalRecord.php?id=<?= $row["id"] ?>">
                      <i class="bx bxs-edit" style="color: black;"></i>
                    </a>
                    |
                    <a href="deleteMedicalRecord.php?id=<?= $row["id"] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?');">
                      <i class="bx bxs-trash" style="color: black;"></i>
                    </a>
                  </td>
                </tr>
                <?php $i++; ?>
               <?php  endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- End Medical Record -->
    </section>

    <!-- CONTENT -->
    <script src="js/medicalRecord.js"></script>
  </body>
</html>
