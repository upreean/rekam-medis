<?php 
require '../assets/database/functions-patientRoom.php';

$id = $_GET["id"];

if (deletePatientRoom($id) > 0) {
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'PatientRoom.php';
        </script>
    ";
} else{
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'patientRoom.php';
        </script>        
    ";
}

?>