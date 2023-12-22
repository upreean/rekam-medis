<?php 
// koneksi data base
require '../assets/database/functions-medicalRecord.php';

$patient = query("SELECT nama_pasien FROM pasien");
$doctor = query("SELECT nama FROM dokter");
$medicine = query("SELECT nama_obat FROM farmasi");
$patientRoom = query("SELECT nama_ruangan FROM ruangan");

// var_dump($patient); die;
// var_dump($medicine); die;
// for ($i=0; $i < sizeof($patient); $i++) { 
//     var_dump($patient[$i]["nama_pasien"]);
// } die;

if (isset($_POST["submit"])) { 
    // cek apakah data berhasil ditambahkan atau tidak
    if (addMedicalRecord($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'medicalRecord.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'medicalRecord.php';
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
            <h1>Tambah Data Rekam Medis</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a href="#">Rekam Medis</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Tambah Rekam Medis</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="table-data">
          <div class="order">
            <div class="form-input">
              <form action="" method="post">
                <label for="tanggal_masuk">Tanggal Masuk: </label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" required />

                <label for="nama_pasien">Nama Pasien: </label>
                <select id="nama_pasien" name="nama_pasien" required>
                <?php for ($i=0; $i < sizeof($patient); $i++) : ?>
                  <option value="<?= $patient[$i]["nama_pasien"] ?>"><?= $patient[$i]["nama_pasien"] ?></option>
                <?php endfor ?>
                </select>
                
                <label for="diagnosis">Diagnosis: </label>
                <input type="text" name="diagnosis" id="diagnosis" placeholder="Masukkan Diagnosis" autocomplete="off" required />
                
                <label for="nama_obat">Nama Obat: </label>
                <select name="nama_obat" id="nama_obat" required>
                <?php for ($i=0; $i < sizeof($medicine); $i++) : ?>
                  <option value="<?= $medicine[$i]["nama_obat"] ?>"><?= $medicine[$i]["nama_obat"] ?></option>
                <?php endfor ?>
                </select>
                
                <label for="nama_dokter">Dokter</label>
                <select name="nama_dokter" id="nama_dokter" required>
                <?php for ($i=0; $i < sizeof($doctor); $i++) : ?>
                  <option value="<?= $doctor[$i]["nama"] ?>"><?= $doctor[$i]["nama"] ?></option>
                <?php endfor ?>
                </select>
                <label for="nama_ruangan">Ruangan</label>
                <select name="nama_ruangan" id="nama_ruangan" required>
                <?php for ($i=0; $i < sizeof($patientRoom); $i++) : ?>
                  <option value="<?= $patientRoom[$i]["nama_ruangan"] ?>"><?= $patientRoom[$i]["nama_ruangan"] ?></option>
                <?php endfor ?>
                </select>
                <button
                  class="btn-kirim"
                  type="submit"
                  name="submit"
                >
                  Simpan
                </button>
                <button
                  class="btn-batal"
                  type="button"
                  onclick="medicalRecord()"
                >
                  Batal
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End Bug Report -->
    </section>

    <!-- CONTENT -->
    <script src="js/medicalRecord.js"></script>
  </body>
</html>
