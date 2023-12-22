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

    function addMedicine($data){
        global $connection;
        // ambil data dari tiap elemen dalam form
        $name = htmlspecialchars($data["nama_obat"]);
        $description = htmlspecialchars($data["keterangan"]);
        
        // query insert data
        $query = "INSERT INTO farmasi
                VALUE
                ('', '$name', '$description')";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function deleteMedicine($id) {
        global $connection;
        // query hapus data
        $query = "DELETE FROM farmasi WHERE id = $id";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function editMedicine($data) {
        global $connection;
        // ambil data dari tiap elemen dalam form
        $id = $data["id"];
        $name = htmlspecialchars($data["nama_obat"]);
        $description = htmlspecialchars($data["keterangan"]);

        // query update data
        $query = "UPDATE farmasi
                SET
                 nama_obat = '$name',
                 keterangan = '$description'
                WHERE id = $id";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function searchMedicine($keyword) {
        $query = "SELECT * FROM farmasi
                    WHERE 
                nama_obat LIKE '%$keyword%' OR
                keterangan LIKE '%$keyword%'";
    
        return query($query);
    }

?>