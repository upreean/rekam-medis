<?php 
require '../assets/database/functions-patient.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) { 
    // cek apakah data berhasil ditambahkan atau tidak
    if (addPatient($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'patient.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'patient.php';
            </script>        
        ";
    }
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
    <!-- CSS -->
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../form-style.css" />
    <!-- Icon -->
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

      <!-- Add Patient -->
      <div class="patient" id="patient">
        <div class="head-title">
          <div class="left">
            <h1>Tambah Data Pasien</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a href="#" onclick="patient()">Pasien</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Tambah Data Pasien</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="table-data">
          <div class="order">
            <div class="form-input">
            <form action="" method="post">
                <label for="no_daftar">No.Pendaftaran: </label>
                <input
                  type="text"
                  id="no_daftar"
                  name="no_daftar"
                  placeholder="Masukkan No.Pendaftaran"
                  required
                />
                <label for="nama_pasien">Nama: </label>
                <input
                  type="text"
                  id="nama_pasien"
                  name="nama_pasien"
                  placeholder="Masukkan Nama"
                  required
                />
                <label for="alamat">Alamat: </label>
                <input
                  type="text"
                  name="alamat"
                  id="alamat"
                  placeholder="Masukkan Alamat"
                  required
                />
                <label for="noHp"> No.Hp: </label>
                <input
                  type="text"
                  id="noHp"
                  name="noHp"
                  placeholder="Masukkan No.Hp"
                  required
                />
                <button
                  class="btn-kirim"
                  type="submit"
                  name="submit"
                >
                  Simpan
                </button>
                <button class="btn-batal" type="button" onclick="patient()">
                  Batal
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Add Patient -->
    </section>

    <!-- CONTENT -->
    <script src="js/patient.js"></script>
  </body>
</html>
