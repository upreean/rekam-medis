<?php 
// koneksi data base
require '../assets/database/functions-patient.php';

$patient = query("SELECT * FROM pasien");
// tombol cari ditekan
if (isset($_POST["search"])) {
  $patient = searchPatient($_POST["keyword"]);
}
// jumlah obat
$patients = query("SELECT COUNT(id) FROM pasien")[0];
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

    <title>REKAM MEDIS | Pasien</title>
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

      <!-- Patient -->
      <div class="patient" id="patient">
        <div class="head-title">
          <div class="left">
            <h1>Pasien</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Pasien</a>
              </li>
            </ul>
          </div>
          <!-- <a href="#" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download PDF</span>
          </a> -->
        </div>

        <ul class="box-info">
          <li>
            <i class="bx"
              ><img src="../assets/img/patient-yellow.png" width="35px"
            /></i>
            <span class="text">
              <h3><?= $patients["COUNT(id)"]; ?></h3>
              <p>Pasien</p>
            </span>
          </li>
        </ul>

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Data Pasien</h3>
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
              
              <a href="#" onclick="addPatient()">
                <i class="bx bx-plus" style="color: black;"></i>
              </a>
              </form>
            </div>
            <table>
              <thead>
                <tr>
                  <th>No. Pendaftaran</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No. Hp</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($patient as $row) : ?>
                <tr>
                  <td>
                    <?= $row["no_daftar"]?>
                  </td>
                  <td>
                    <p><?= $row["nama_pasien"] ?></p>
                  </td>
                  <td><?= $row["alamat"] ?></td>
                  <td><?= $row["noHp"] ?></td>
                  <td>
                    <a href="editPatient.php?id=<?= $row["id"] ?>">
                      <i class="bx bxs-edit" style="color: black;"></i>
                    </a>
                    |
                    <a href="deletePatient.php?id=<?= $row["id"] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?');">
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
      <!-- Patient -->
    </section>
    <!-- CONTENT -->

    <script src="js/patient.js"></script>
  </body>
</html>
