<?php
@include('sidebar.php');
// @include("../../support/database.php");

$idData = $_GET['id'];


// echo $idData;w

$ambildata = "SELECT * FROM student WHERE id=$idData";
$result = mysqli_query($koneksi, $ambildata) or die($koneksi);
$row = mysqli_fetch_array($result);

if (isset($_POST['ubah'])) {
    $nomor_induk = $_POST['nomor_induk'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $ubah = ("UPDATE student SET nomor_induk='$nomor_induk', nama='$nama', alamat='$alamat', tanggal_lahir='$tanggal_lahir' WHERE id = $idData");
    $result = mysqli_query($koneksi, $ubah) or die($koneksi);
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data.php">';

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../public/css/siswa/editdatas.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <div class="judul">
            <h2>Edit Data Siswa</h2>
        </div>

        <div class="form">
            <form action="" method="post">
                <input type="text" name="nomor_induk" value="<?php echo $row['nomor_induk'] ?>" id="inp">
                <input type="text" name="nama" value="<?php echo $row['nama'] ?>" id="inp">
                <input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" id="inp">
                <input type="text" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir'] ?>" id="inp">

                <input type="submit" name="ubah" id="sub">
            </form>
        </div>
    </div>
</body>

</html>