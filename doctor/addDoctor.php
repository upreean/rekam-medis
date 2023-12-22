<?php 
require '../assets/database/functions-doctor.php';
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) { 
    // cek apakah data berhasil ditambahkan atau tidak
    if (addDoctor($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'doctor.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'doctor.php';
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

      <!-- Add Doctor -->
      <div class="doctor" id="doctor">
        <div class="head-title">
          <div class="left">
            <h1>Tambah Data Dokter</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a href="#" onclick="doctor()">Dokter</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Tambah Data Dokter</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="table-data">
          <div class="order">
            <div class="form-input">
              <form action="" method="post" enctype="multipart/form-data">
                <label for="nama">Nama: </label>
                <input
                  type="text"
                  id="nama"
                  name="nama"
                  placeholder="Masukkan Nama"
                  autocomplete="off"
                  required
                />
                <label for="nip">NIP: </label>
                <input
                  type="text"
                  id="nip"
                  name="nip"
                  placeholder="Masukkan NIP"
                  autocomplete="off"
                  required
                />

                <label for="spesialis"> Spesialis: </label>
                <input
                  type="text"
                  id="spesialis"
                  name="spesialis"
                  placeholder="Masukkan Spesialis"
                  autocomplete="off"
                  required
                />
                <label for="noHp"> No.Hp: </label>
                <input
                  type="text"
                  id="noHp"
                  name="noHp"
                  placeholder="Masukkan No.Hp"
                  autocomplete="off"
                  required
                />
                <label for="gambar"> Gambar: </label>
                <input
                  type="file"
                  id="gambar"
                  name="gambar"
                  required
                />
                <button
                  class="btn-kirim"
                  type="submit"
                  name="submit"
                  >
                  Simpan
                </button>
                <button class="btn-batal" type="button" onclick="doctor()">
                  Batal
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTENT -->
    <script src="js/doctor.js"></script>
  </body>
</html>
