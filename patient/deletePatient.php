<?php 
require '../assets/database/functions-patient.php';

    $id = $_GET["id"];

    if (deletePatient($id) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'patient.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href = 'patient.php';
            </script>        
        ";
    }
?>