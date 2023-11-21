<?php
@include('sidebar.php');
// @include("../../support/database.php");

$idData = $_GET['id'];


// echo $idData;w

$ambildata = "SELECT grades.*, student.nama, mapel.deskripsi FROM grades INNER JOIN student ON grades.student_id = student.id INNER JOIN mapel ON grades.subject_id = mapel.id  WHERE grades.id ='$idData' ";
$result = mysqli_query($koneksi, $ambildata) or die($koneksi);
$row = mysqli_fetch_array($result);

if (isset($_POST['ubah'])) {
    $student = $_POST['siswa'];
    $mapel = $_POST['mapel'];
    $jenisnilai = $_POST['jenis_nilai'];
    $nilai = $_POST['nilai'];


    $ubah = ("UPDATE grades SET student_id='$student', subject_id='$mapel', jenis_nilai='$jenisnilai', nilai='$nilai' WHERE id = $idData");
    $result = mysqli_query($koneksi, $ubah) or die($koneksi);
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data.php">';

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../public/css/nilai/editdata.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <div class="judul">
            <h2>Edit Data Nilai</h2>
        </div>

        <div class="form">
            <form action="" method="post">

                <select name="siswa" id="dropdown">
                    <option select='selected' value="<?php echo $row['student_id']; ?>">
                        <?php echo $row['nama']; ?>
                        <!-- pilih siswa -->
                    </option>

                    <?php $siswa = "SELECT * FROM student";
                    $hasil = mysqli_query($koneksi, $siswa) or die($koneksi);
                    while ($data = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $data['id'] ?>">
                            <?php echo $data['nama'] ?>
                        </option>

                    <?php } ?>
                </select>

                <select name="mapel" id="dropdown">
                    <option select='selected' value="<?php echo $row['subject_id']; ?>">
                        <?php echo $row['deskripsi']; ?>
                        <!-- pilih mapel -->
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

                <input type="text" name="jenis_nilai" value="<?php echo $row['jenis_nilai'] ?>" id="inp">
                <input type="text" name="nilai" value="<?php echo $row['nilai'] ?>" id="inp">

                <input type="submit" name="ubah" id="sub">
            </form>
        </div>
    </div>
</body>

</html>