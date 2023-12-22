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

    function addPatient($data){
        global $connection;
        // ambil data dari tiap elemen dalam form
        $name = htmlspecialchars($data["nama_pasien"]);
        $address = htmlspecialchars($data["alamat"]);
        $phoneNumber = htmlspecialchars($data["noHp"]);
        $registNumber = htmlspecialchars($data["no_daftar"]);
        
        // query insert data
        $query = "INSERT INTO pasien
                VALUE
                ('', '$name', '$address', '$phoneNumber', '$registNumber')";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function deletePatient($id) {
        global $connection;
        // query hapus data
        $query = "DELETE FROM pasien WHERE id = $id";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function editPatient($data) {
        global $connection;
        // ambil data dari tiap elemen dalam form
        $id = $data["id"];
        $name = htmlspecialchars($data["nama_pasien"]);
        $address = htmlspecialchars($data["alamat"]);
        $phoneNumber = htmlspecialchars($data["noHp"]);
        $registNumber = htmlspecialchars($data["no_daftar"]);

        // query update data
        $query = "UPDATE pasien
                SET
                 nama_pasien = '$name',
                 alamat = '$address',
                 noHp = '$phoneNumber',
                 no_daftar = '$registNumber'
                WHERE id = $id";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function searchPatient($keyword) {
        $query = "SELECT * FROM pasien
                    WHERE 
                nama_pasien LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' OR 
                noHp LIKE '%$keyword%' OR
                no_daftar LIKE '%$keyword%'";
    
        return query($query);
    }

?>