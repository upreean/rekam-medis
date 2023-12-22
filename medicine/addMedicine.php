<?php 
require '../assets/database/functions-medicine.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) { 
    // cek apakah data berhasil ditambahkan atau tidak
    if (addMedicine($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'medicine.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'medicine.php';
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
    <title>REKAM MEDIS | Farmasi</title>
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

      <!-- Medicine -->
      <div class="medicine" id="medicine">
        <div class="head-title">
          <div class="left">
            <h1>Tambah Data Obat</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a href="#">Farmasi</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Tambah Data Obat</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="table-data">
          <div class="order">
            <div class="form-input">
            <form action="" method="post">
                <label for="nama_obat">Nama Obat: </label>
                <input
                  type="text"
                  id="nama_obat"
                  name="nama_obat"
                  placeholder="Masukkan Nama Obat"
                  autocomplete="off"
                  required
                />
                <label for="keterangan">Keterangan: </label>
                <input
                  type="text"
                  name="keterangan"
                  id="keterangan"
                  placeholder="Masukkan Keterangan"
                  autocomplete="off"
                  required
                />
                <button
                  class="btn-kirim"
                  type="submit"
                  name="submit"
                >
                  Simpan
                </button>
                <button class="btn-batal" type="button" onclick="medicine()">
                  Batal
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTENT -->
    <script src="js/medicine.js"></script>
  </body>
</html>
