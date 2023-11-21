<?php
@include('sidebar.php');
// @include('../../support/database.php');
// session_start();

if (isset($_POST['tambah'])) {
    $siswaid = $_POST['siswa'];
    $mapel = $_POST['mapel'];
    $jenisnilai = $_POST['jenis_nilai'];
    $nilai = $_POST['nilai'];

    echo $siswaid;

    $tambah = "INSERT INTO `grades` (`id`, `student_id`, `subject_id`, `jenis_nilai`, `nilai`, `created_at`, `updated_at`) VALUES ('', '$siswaid', '$mapel', '$jenisnilai', '$nilai', '','');";
    $result = mysqli_query($koneksi, $tambah) or die($koneksi);
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data.php">';

}

// $siswa = $_POST['mapel'];

// echo $siswa;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../public/css/nilai/tambahs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="judul">
            <h2>Tambah Data</h2>
        </div>
        <div class="form">
            <form action="" method="post">

                <select name="siswa" id="dropdown">
                    <option select='selected'>
                        <?php //echo $row['student_id']; ?>
                        pilih siswa
                    </option>

                    <?php $siswa = "SELECT * FROM student";
                    $hasil = mysqli_query($koneksi, $siswa) or die($koneksi);
                    while ($data = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $data['id'] ?>">
                            <?php echo $data['nama'] ?>
                            <?php echo $data['id'] ?>
                        </option>

                    <?php } ?>
                </select>

                <select name="mapel" id="dropdown">
                    <option select='selected'>
                        <?php //echo $row['student_id']; ?>
                        pilih mapel
                    </option>

                    <?php $mapel = "SELECT * FROM mapel";
                    $hasil = mysqli_query($koneksi, $mapel) or die($koneksi);
                    while ($data = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $data['id'] ?>">
                            <?php echo $data['deskripsi'] ?>
                        </option>

                    <?php } ?>
                </select>

                <input type="text" name="jenis_nilai" id="inp" placeholder="jenis nilai" required>
                <input type="text" name="nilai" id="inp" placeholder="nilai" required>

                <input type="submit" name="tambah" value="tambah" id="sub">

            </form>
        </div>
    </div>
</body>

</html>