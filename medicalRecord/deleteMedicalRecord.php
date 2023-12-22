<?php 
// koneksi data base
require '../assets/database/functions-medicalRecord.php';

    $id = $_GET["id"];

    // cek apakah data berhasil ditambahkan atau tidak
    if (deleteMedicalRecord($id) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'medicalRecord.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href = 'medicalRecord.php';
            </script>        
        ";
    }


?>