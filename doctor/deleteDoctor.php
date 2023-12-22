<?php 
require '../assets/database/functions-doctor.php';

    $id = $_GET["id"];

    if (deleteDoctor($id) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'doctor.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href = 'doctor.php';
            </script>        
        ";
    }
?>