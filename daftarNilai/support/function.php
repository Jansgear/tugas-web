<?php 
function registrasi($data)
{
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $level = ($data['level']);

    $cek1 = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username' ");

    if (mysqli_fetch_array($cek1)) {
        echo "<script>
                    alert('username sudah ada');
                </script>";

        return false;
    }

    //mengecek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                    alert('password tidak sama')
                </script>";

        return false;
    }

    if (empty($level)) {
        echo "<script> alert('profesi kosong') </script>";
        return false;
    }

    //enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    // untuk input data ke table
    $query = mysqli_query($koneksi, "INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES (NULL, '$username', '$password', '$level')");
    // $return = mysqli_affected_rows($conn);
    // echo $return;

    if ($query) {
        header('location:login.php');
    }

}
?>