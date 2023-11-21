<?php
@include('../../support/database.php');

$id = $_GET['id'];
echo $id;

$select = "SELECT * FROM student WHERE id = '$id' ";
$result = mysqli_query($koneksi, $select) or die($koneksi);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../public/css/dataSiswa.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div class="atas">
            <div class="img-siswa">
                <img src="" alt="">
            </div>

            <div class="biodata">
                <input type="text" name="nama" value="<?php echo $row['nama'] ?>" id="">
                <input type="text" name="nomor_induk" value="<?php echo $row['nomor_induk'] ?>" id="">
                <input type="text" name="alamat" id="">
                <input type="text" name="tanggal_lahir" id="">

            </div>
        </div>

        <div class="bawah">

        </div>
    </div>
</body>

</html>