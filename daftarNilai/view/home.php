<?php
@include('sidebar.php');
// session_start();

if ($_SESSION['login'] == null) {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../public/css/home.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="kiri">

            <?php

            $id = $_SESSION['id'];
            $nama = $_SESSION['username'];

            $datahome = "SELECT grades.*, student.nama, mapel.deskripsi FROM grades INNER JOIN student ON grades.student_id = student.id INNER JOIN mapel ON grades.subject_id = mapel.id WHERE student.nama = '$nama' ";
            $result = mysqli_query($koneksi, $datahome) or die($koneksi);

            if (mysqli_num_rows($result) > 0) {

                $i = 0;
                $no = 1;
                while ($rowselect = mysqli_fetch_array($result)) {
                    ?>

                    <div class="card">
                        <input type="text" name="" value="<?php echo $rowselect['nama'] ?>" id="" readonly>
                        <input type="text" name="" value="<?php echo $rowselect['deskripsi'] ?>" id="" readonly>
                        <input type="text" name="" value="<?php echo $rowselect['jenis_nilai'] ?>" id="" readonly>
                        <input type="text" name="" value="<?php echo $rowselect['nilai'] ?>" id="" readonly>
                    </div>


                    <?php $no++;
                }

            }

            ?>
        </div>

        <div class="kanan">
            <div class="profile">
                <?php
                $datasiswa = "SELECT * FROM user WHERE id = '$id' ";
                $result2 = mysqli_query($koneksi, $datasiswa) or die($koneksi);
                $row = mysqli_fetch_array($result2);

                ?>
                <div class="img"></div>
                <div class="biodata">

                    <input type="text" name="nomor_induk" value="id : <?php echo $row['id'] ?>" id="" readonly>
                    <input type="text" name="" value="Nama : <?php echo $row['username'] ?>" id="" readonly>

                </div>
            </div>
        </div>
    </div>
</body>

<script>
    if (window.innerWidth <= 768) {
        document.querySelector('meta[name="viewport"]').content = 'width=1024';
    }
</script>

</html>