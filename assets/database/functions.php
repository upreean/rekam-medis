<?php 
    $connection = mysqli_connect("localhost", "root", "", "rekam-medis"); 

    function query($query){
        global $connection;
        $result = mysqli_query($connection, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

$doctors = query("SELECT COUNT(id) FROM dokter")[0];
$medicines = query("SELECT COUNT(id) FROM farmasi")[0];
$patients = query("SELECT COUNT(id) FROM pasien")[0];
$patientRooms = query("SELECT COUNT(id) FROM ruangan")[0];
?>