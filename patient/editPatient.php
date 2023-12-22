<?php 
require '../assets/database/functions-patient.php';

// ambil data di URL
$id = $_GET["id"];
$patient = query("SELECT * FROM pasien WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) { 
    // cek apakah data berhasil ditambahkan atau tidak
    if (editPatient($_POST) > 0) {
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
                <input type="hidden" name="id" value="<?= $patient["id"]; ?>" >              
                <label for="no_daftar">No.Pendaftaran: </label>
                <input
                  type="text"
                  id="no_daftar"
                  name="no_daftar"
                  value="<?= $patient["no_daftar"]; ?>"
                  required
                />
                <label for="nama_pasien">Nama: </label>
                <input
                  type="text"
                  id="nama_pasien"
                  name="nama_pasien"
                  value="<?= $patient["nama_pasien"]; ?>"
                  required
                />
                <label for="alamat">Alamat: </label>
                <input
                  type="text"
                  name="alamat"
                  id="alamat"
                  value="<?= $patient["alamat"]; ?>"
                  required
                />
                <label for="noHp"> No.Hp: </label>
                <input
                  type="text"
                  id="noHp"
                  name="noHp"
                  value="<?= $patient["noHp"]; ?>"
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
