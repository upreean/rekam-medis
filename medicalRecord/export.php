<?php 
// koneksi data base
require '../assets/database/functions-medicalRecord.php';

$medicalRecord = query("SELECT * FROM rekam_medis");

// tombol cari ditekan
if (isset($_POST["search"])) {
  $medicalRecord = searchMedicalRecord($_POST["keyword"]);
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
    
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <!-- Icon -->
    <link rel="icon" href="../assets/img/healthcare.png" />

    <title>REKAM MEDIS | Rekam Medis</title>
  </head>
  <body>
      <!-- Medical Record -->
      <div class="medical-record" id="medical-record">

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Rekam Medis</h3>
            </div>
            <table id="dataTable3">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal Masuk</th>
                  <th>Nama Pasien</th>
                  <th>Diagnosis</th>
                  <th>Nama Obat</th>
                  <th>Dokter</th>
                  <th>Ruangan</th>
                </tr>
              </thead>
              <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($medicalRecord as $row) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $row["tanggal_masuk"] ?></td>
                  <td><?= $row["nama_pasien"] ?></td>
                  <td><?= $row["diagnosis"] ?></td>
                  <td><?= $row["nama_obat"] ?></td>
                  <td><?= $row["nama_dokter"] ?></td>
                  <td><?= $row["nama_ruangan"] ?></td>
                </tr>
                <?php $i++; ?>
               <?php  endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- End Medical Record -->
    </section>

<!-- Data Table -->
<script>
$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          'pdf', 'print',
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

	
    <!-- CONTENT -->
    <script src="js/medicalRecord.js"></script>
  </body>
</html>
