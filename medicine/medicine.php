<?php 
// koneksi data base
require '../assets/database/functions-medicine.php';

$medicine = query("SELECT * FROM farmasi");

// tombol cari ditekan
if (isset($_POST["search"])) {
  $medicine = searchMedicine($_POST["keyword"]);
}

// jumlah obat
$medicines = query("SELECT COUNT(id) FROM farmasi")[0];
// var_dump($amount[0]["COUNT(id)"]); die;
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
            <h1>Farmasi</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Farmasi</a>
              </li>
            </ul>
          </div>
        </div>

        <ul class="box-info">
          <li>
            <i class="bx"
              ><img src="../assets/img/medicines-purple.png" width="30px"
            /></i>
            <span class="text">
              <h3><?= $medicines["COUNT(id)"]; ?></h3>
              <p>Farmasi</p>
            </span>
          </li>
        </ul>

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Data Farmasi</h3>
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
              
              <a href="#" onclick="addMedicine()">
                <i class="bx bx-plus" style="color: black;"></i>
              </a>
              </form>
            </div>
            <table>
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Obat</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach ($medicine as $row) : ?>
                <tr>
                  <td>
                    <?= $i; ?>
                  </td>
                  <td>
                    <p><?= $row["nama_obat"] ?></p>
                  </td>
                  <td><?= $row["keterangan"] ?></td>
                  <td>
                    <a href="editMedicine.php?id=<?= $row["id"] ?>">
                      <i class="bx bxs-edit" style="color: black;"></i>
                    </a>
                    |
                    <a href="deleteMedicine.php?id=<?= $row["id"] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?');">
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
      <!-- End Bug Report -->
    </section>

    <!-- CONTENT -->
    <script src="js/medicine.js"></script>
  </body>
</html>
