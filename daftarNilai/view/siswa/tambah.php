<?php
// @include('../../support/database.php');
@include('sidebar.php');

if (isset($_POST['tambah'])) {
    $nomor_induk = $_POST['nomor_induk'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $tambah = "INSERT INTO `student` (`id`, `nomor_induk`, `nama`, `alamat`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES ('', '$nomor_induk', '$nama', '$alamat', '$tanggal_lahir', '','');";
    $result = mysqli_query($koneksi, $tambah) or die($koneksi);
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data.php">';

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../public/css/siswa/tambahs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="judul">
            <h2>Tambah Data Siswa</h2>
        </div>
        <div class="form">
            <form action="" method="post">
                <input type="text" name="nomor_induk" id="inp" placeholder="nomor induk">
                <input type="text" name="nama" id="inp" placeholder="nama">
                <input type="text" name="alamat" id="inp" placeholder="alamat">
                <input type="date" name="tanggal_lahir" id="inp" placeholder="tanggal lahir">

                <input type="submit" name="tambah" id="sub">
            </form>
        </div>
    </div>

</body>

</html>