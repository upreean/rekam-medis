<?php 
require '../assets/database/functions-medicine.php';

    $id = $_GET["id"];

    if (deleteMedicine($id) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'medicine.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href = 'medicine.php';
            </script>        
        ";
    }
?>