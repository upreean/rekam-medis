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

function register($data) {
    global $connection;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($connection, $data["password"]);
    $confirmPassword = mysqli_real_escape_string($connection, $data["confirm-password"]);
    $email = strtolower($data["email"]);
    $gambar = "user.png";

    // cek usernam sudah ada atau belum
    $result = mysqli_query($connection, "SELECT username FROM users WHERE username= '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar')
            </script>";
        return false;
    }

    if ($password !== $confirmPassword) {
        echo "<script>
                alert('password tidak sesuai')
            </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password); die;

    // tambahkan userbaru ke database
    mysqli_query($connection, "INSERT INTO users VALUES('', '$username', '$password', '$email', '$gambar')");

    return mysqli_affected_rows($connection);
}

function upload($username) {
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
    $newFileName = $username.".".$extension;
    move_uploaded_file($tmpName, 'img/' . $newFileName);

    return $newFileName;
}

function editProfile() {
    global $connection;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $email = htmlspecialchars($data["email"]);
    $image = htmlspecialchars($data["gambar"]);

    $fileName = $_FILES['gambar']['name'];
   
    if ($_FILES["gambar"]["error"] === 4) {
        $newImage = $image;
    }else {
        // parameter $nip digunakan untuk mengubah nama file gambar
        if ($fileName !== "user.png") {
            unlink('img/' . $file["image"]);
        }
        $newImage = upload($username);
        if (!$newImage) {
            return false;
        }
    }

    // query update data
    $query = "UPDATE users
            SET
             username = '$username',
             password = '$password',
             email = '$email',
             gambar = '$newImage'
            WHERE id = $id";
    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection);   
}