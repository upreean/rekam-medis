<?php 
session_start();
require '../assets/database/functions-user.php';

$id = $_SESSION['id'];
$user = query("SELECT * FROM users WHERE id = $id")[0];
  // var_dump($user); die;
  // cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) { 
  // cek apakah data berhasil diubah atau tidak
  if (editProfile($_POST) > 0) {
      echo "
          <script>
              alert('Profile Berhasil Diubah');
              document.location.href = '../index.php';
          </script>
      ";
  } else{
      echo "
          <script>
              alert('Profile Gagal Diubah');
              document.location.href = '../index.php';
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
    <link rel="stylesheet" href="setting.css" />
    <link rel="stylesheet" href="../form-style.css" />

    <link rel="icon" href="../assets/img/healthcare.png" />

    <title>E-File</title>
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

      <div class="medical-record" id="medical-record">
        <div class="head-title">
          <div class="left">
            <h1>Setting</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Settings</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="table-data">
          <div class="order">
            <div class="form-input">
              <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $user["id"]; ?>" >   
              <input type="hidden" name="gambar" value="<?= $user["gambar"]; ?>" >  
              <input type="hidden" name="gambar" value="<?= $user["password"]; ?>" >                           
                <label for="gambar"> Foto Profile: </label><br>
                <img src="img/<?= $user["gambar"]?>" height="100">
                <input
                  type="file"
                  id="gambar"
                  name="gambar"
                />
                <label for="nama">Nama: </label>
                <input
                  type="text"
                  id="nama"
                  name="nama"
                  value=<?= $user["username"]?>
                  required
                />
                <label for="nip">Email: </label>
                <input
                  type="text"
                  id="nip"
                  name="nip"
                  value=<?= $user["email"]?>
                  required
                />
                <button
                  class="btn-kirim"
                  type="submit"
                  name="submit"
                  >
                  Simpan
                </button>
                <button class="btn-batal" type="button" onclick="setting()">
                  Batal
                </button>
              </form>
            </div>
          </div>
        </div>
        <!-- <div class="card">
          <div class="card-body">
            <div class="profile-image">
              <img
                src="https://salam.uinsgd.ac.id/assets/img/your-profile-image.jpg"
                alt="Aprian Nur Rohman"
                class="img-thumbnail"
                style="width: 150px; object-fit: cover"
              />
            </div>
            <div class="profile-info">
              <h3 class="card-title">Profil 1217050018</h3>
              <ul class="list-unstyled">
                <li><strong>Username:</strong> 1217050018</li>
                <li><strong>First Name:</strong> Aprian Nur Rohman</li>
                <li><strong>Last Name:</strong> -</li>
                <li><strong>Email:</strong> -</li>
              </ul>
            </div>
            <div class="card-footer">
              <a
                href="https://salam.uinsgd.ac.id/dashboard/index.php/profil/edit"
                class="btn btn-primary"
                >Ubah Profil</a
              >
              <a
                href="https://salam.uinsgd.ac.id/dashboard/index.php/profil/change-password"
                class="btn btn-info"
                >Ubah Password</a
              >
            </div>
          </div>
        </div> -->
      </div>
      <!-- End Setting -->
    </section>
    <!-- CONTENT -->

    <script src="setting.js"></script>
  </body>
</html>
