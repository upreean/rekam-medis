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

    function addPatientRoom($data){
        global $connection;
        // ambil data dari tiap elemen dalam form
        $name = htmlspecialchars($data["nama_ruangan"]);
        $description = htmlspecialchars($data["keterangan"]);
        
        // query insert data
        $query = "INSERT INTO ruangan
                VALUE
                ('', '$name', '$description')";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function deletePatientRoom($id) {
        global $connection;
        // query hapus data
        $query = "DELETE FROM ruangan WHERE id = $id";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function editPatientRoom($data) {
        global $connection;
        // ambil data dari tiap elemen dalam form
        $id = $data["id"];
        $name = htmlspecialchars($data["nama_ruangan"]);
        $description = htmlspecialchars($data["keterangan"]);

        // query update data
        $query = "UPDATE ruangan
                SET
                 nama_ruangan = '$name',
                 keterangan = '$description'
                WHERE id = $id";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function searchPatientRoom($keyword) {
        $query = "SELECT * FROM ruangan
                    WHERE 
                nama_ruangan LIKE '%$keyword%' OR
                keterangan LIKE '%$keyword%'";
    
        return query($query);
    }

?>