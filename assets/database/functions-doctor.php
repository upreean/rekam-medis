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

    function addDoctor($data){
        global $connection;
        // ambil data dari tiap elemen dalam form
        $name = htmlspecialchars($data["nama"]);
        $nip = htmlspecialchars($data["nip"]);
        $specialist = htmlspecialchars($data["spesialis"]);
        $phoneNumber = htmlspecialchars($data["noHp"]);
        $image = htmlspecialchars($data["gambar"]);
       
        // upload gambar
        $image = upload($nip);
    
        if (!$image) {
            return false;
        }
        
        // query insert data
        $query = "INSERT INTO dokter
                VALUE
                ('', '$name', '$nip', '$specialist', '$phoneNumber', '$image')";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }
    
    function upload($nip) {
        $fileName = $_FILES['gambar']['name'];
        $fileSize = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if ($error === 4) {
            echo "<script>
            alert('Tidak ada gambar yang diupload');        
            </script>";
            return false;
        }

        $extensionValid = ['jpg', 'jpeg', 'png'];
        $extension = explode('.', $fileName);
        $extension = strtolower(end($extension));
        if (!in_array($extension, $extensionValid)) {
            echo "<script>
            alert('File yang anda upload bukan gambar');        
            </script>";
            return false;
        }

        // cek jika ukurannya terlalu besar
        if ($fileSize > 10000000) {
            echo "<script>
            alert('Ukuran gambar terlalu besar');        
            </script>";
            return false;
        }
        $newFileName = "gambar-".$nip.".".$extension;
        move_uploaded_file($tmpName, 'img/' . $newFileName);

        return $newFileName;
    }

    function deleteDoctor($id) {
        global $connection;
        $file = query("SELECT * FROM dokter WHERE id=$id");
        unlink('img/' . $file["gambar"]);
        // query hapus data
        $query = "DELETE FROM dokter WHERE id = $id";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function editDoctor($data) {
        global $connection;
        // ambil data dari tiap elemen dalam form
        $id = $data["id"];
        $name = htmlspecialchars($data["nama"]);
        $nip = htmlspecialchars($data["nip"]);
        $specialist = htmlspecialchars($data["spesialis"]);
        $phoneNumber = htmlspecialchars($data["noHp"]);
        $image = htmlspecialchars($data["gambar"]);
       
        if ($_FILES["gambar"]["error"] === 4) {
            $newImage = $image;
        }else {
            // parameter $nip digunakan untuk mengubah nama file gambar
            unlink('img/' . $file["image"]);
            $newImage = upload($nip);
            if (!$newImage) {
                return false;
            }
        }

        // query update data
        $query = "UPDATE dokter
                SET
                 nama = '$name',
                 nip = '$nip',
                 spesialis = '$specialist', 
                 noHp = '$phoneNumber', 
                 gambar = '$newImage'
                WHERE id = $id";
        mysqli_query($connection, $query);
    
        return mysqli_affected_rows($connection);
    }

    function searchDoctor($keyword) {
        $query = "SELECT * FROM dokter
                    WHERE 
                nama LIKE '%$keyword%' OR
                nip LIKE '%$keyword%' OR
                spesialis LIKE '%$keyword%' OR
                noHp LIKE '%$keyword%'";
    
        return query($query);
    }

?>