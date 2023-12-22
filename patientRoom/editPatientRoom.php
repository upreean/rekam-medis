<?php 
require '../assets/database/functions-patientRoom.php';

// ambil data di URL
$id = $_GET["id"];
$patientRoom = query("SELECT * FROM ruangan WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) { 
    // cek apakah data berhasil Diubah atau tidak
    if (editPatientRoom($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = 'patientRoom.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href = 'patientRoom.php';
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

    <title>REKAM MEDIS | Ruang Inap</title>
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
      <div class="patient-room" id="patient-room">
        <div class="head-title">
          <div class="left">
            <h1>Tambah Data Ruangan</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a href="#">Ruangan</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Tambah Data Ruangan</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="table-data">
          <div class="order">
            <div class="form-input">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $patientRoom["id"]; ?>" >              
                <label for="nama_ruangan">Nama Ruangan: </label>
                <input
                  type="text"
                  id="nama_ruangan"
                  name="nama_ruangan"
                  value="<?= $patientRoom["nama_ruangan"]; ?>" 
                  required
                />
                <label for="keterangan">Keterangan: </label>
                <input
                  type="text"
                  name="keterangan"
                  id="keterangan"
                  value="<?= $patientRoom["keterangan"]; ?>" 
                  required
                />
                <button
                  class="btn-kirim"
                  type="submit"
                  name="submit"
                >
                  Simpan
                </button>
                <button class="btn-batal" type="button" onclick="patientRoom()">
                  Batal
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Patient Room -->
    </section>

    <!-- CONTENT -->
    <script src="js/patientRoom.js"></script>
  </body>
</html>
