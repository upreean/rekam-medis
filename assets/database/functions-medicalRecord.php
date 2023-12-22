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

    function addMedicalRecord($data){
        global $connection;
        // ambil data dari tiap elemen dalam form
        $entryDate = htmlspecialchars($data["tanggal_masuk"]);
        $patientName = htmlspecialchars($data["nama_pasien"]);
        $diagnosis = htmlspecialchars($data["diagnosis"]);
        $medicineName = htmlspecialchars($data["nama_obat"]);
        $doctorName= htmlspecialchars($data["nama_dokter"]);
        $roomName= htmlspecialchars($data["nama_ruangan"]);
        
        // query insert data
        $query = "INSERT INTO rekam_medis
                VALUE
                ('', '$entryDate', '$patientName', '$diagnosis', '$medicineName','$doctorName','$roomName')";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function deleteMedicalRecord($id) {
        global $connection;
        // query hapus data
        $query = "DELETE FROM rekam_medis WHERE id = $id";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function editMedicalRecord($data) {
        global $connection;
        // ambil data dari tiap elemen dalam form
        $id = $data["id"];
        $entryDate = htmlspecialchars($data["tanggal_masuk"]);
        $patientName = htmlspecialchars($data["nama_pasien"]);
        $diagnosis = htmlspecialchars($data["diagnosis"]);
        $medicineName = htmlspecialchars($data["nama_obat"]);
        $doctorName= htmlspecialchars($data["nama_dokter"]);
        $roomName= htmlspecialchars($data["nama_ruangan"]);

        // query update data
        $query = "UPDATE rekam_medis
                SET
                tanggal_masuk = '$entryDate',
                nama_pasien = '$patientName',
                diagnosis = '$diagnosis', 
                nama_obat = '$medicineName', 
                nama_dokter = '$doctorName',
                nama_ruangan = '$roomName'
                WHERE id = $id";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function searchMedicalRecord($keyword) {
        $query = "SELECT * FROM rekam_medis
                    WHERE 
                tanggal_masuk LIKE '%$keyword%' OR
                nama_pasien  LIKE '%$keyword%' OR
                diagnosis LIKE '%$keyword%' OR
                nama_obat LIKE '%$keyword%' OR
                nama_dokter LIKE '%$keyword%' OR
                nama_ruangan LIKE '%$keyword%'";
    
        return query($query);
    }

?>