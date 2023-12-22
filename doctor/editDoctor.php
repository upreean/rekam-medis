<?php 
require '../assets/database/functions-doctor.php';

// ambil data di URL
$id = $_GET["id"];
$doctor = query("SELECT * FROM dokter WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) { 
    // cek apakah data berhasil diubah atau tidak
    if (editDoctor($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = 'doctor.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Diubah');
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
    <!-- My CSS -->
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../form-style.css" />

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

      <!-- Medical Record -->
      <div class="doctor" id="doctor">
        <div class="head-title">
          <div class="left">
            <h1>Ubah Data Dokter</h1>
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
                <a class="active" href="#">Ubah Data Dokter</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="table-data">
          <div class="order">
            <div class="form-input">
              <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $doctor["id"]; ?>" >
              <input type="hidden" name="gambar" value="<?= $doctor["gambar"]; ?>" >
                <label for="nama">Nama: </label>
                <input
                  type="text"
                  id="nama"
                  name="nama"
                  value=<?= $doctor["nama"]?>
                  required
                />
                <label for="nip">NIP: </label>
                <input
                  type="text"
                  id="nip"
                  name="nip"
                  value=<?= $doctor["nip"]?>
                  required
                />

                <label for="spesialis"> Spesialis: </label>
                <input
                  type="text"
                  id="spesialis"
                  name="spesialis"
                  value=<?= $doctor["spesialis"]?>
                  required
                />
                <!-- <select name="job-title" id="job-title" required>
                  <option value="Penyakit Dalam">Penyakit Dalam</option>
                  <option value="Jantung">Jantung</option>
                  <option value="THT">THT</option>
                  <option value="Ortopedi">Ortopedi</option>
                  <option value="Mata">Mata</option>
                </select> -->
                <label for="noHp"> No.Hp: </label>
                <input
                  type="text"
                  id="noHp"
                  name="noHp"
                  value=<?= $doctor["noHp"]?>
                  required
                />
                <label for="gambar"> Gambar: </label><br>
                <img src="img/<?= $doctor["gambar"]?>" height="100">
                <input
                  type="file"
                  id="gambar"
                  name="gambar"
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
      <!-- End Bug Report -->
    </section>

    <!-- CONTENT -->
    <script src="js/doctor.js"></script>
  </body>
</html>
