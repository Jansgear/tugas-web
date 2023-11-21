<?php
@include('sidebar.php');
// @include('../../support/database.php');
// session_start();

$datanilai = "SELECT grades.*, student.nama, mapel.deskripsi FROM grades INNER JOIN student ON grades.student_id = student.id INNER JOIN mapel ON grades.subject_id = mapel.id";
// $datanilai = "SELECT * FROM grades";
$result = mysqli_query($koneksi, $datanilai) or die($koneksi);
// $row = mysqli_fetch_array($result);


if (isset($_GET['hapus'])) {

    $id_grade = $_GET['id'];
    $hapus = "DELETE  FROM `grades` WHERE `id` = '$id_grade' ";
    $hapushasil = mysqli_query($koneksi, $hapus) or die($koneksi);
}
;



?>

<?php if ($_SESSION['level'] == '1') { ?>
<?php } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="../../public/css/nilai/datas.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="kiri">

            <div class="judul" style="text-align:center;">
                <h2>Daftar Nilai</h2>
            </div>

            <div class="atas">

                <div class="tambah">
                    <a href="tambah.php"><i class="fa-solid fa-file-circle-plus"></i></a>
                </div>

                <div class="cari">

                    <form action="" method="get">

                        <input type="text" name="cari" value="<?php if (isset($_GET['cari'])) {
                            echo $_GET['cari'];
                        } ?>" placeholder="Masukkan pencarian...">
                        <input type="submit">

                    </form>

                </div>

            </div>

            <!-- pagiation -->
            <div class="page">
                <?php

                $jumlahdataperhalaman = 5;
                $jumlahdata = mysqli_query($koneksi, "SELECT * FROM student");
                $hasiljumlah = mysqli_num_rows($jumlahdata);
                $jumlahhalaman = ceil($hasiljumlah / $jumlahdataperhalaman);
                $halamanaktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

                $awaldata = ($halamanaktif > 1) ? ($jumlahdataperhalaman * $halamanaktif) - $jumlahataperhalaman : 0;

                ?>


                <?php if ($halamanaktif > 1) { ?>
                    <a href="?halaman=<?= $halamanaktif - 1; ?>">&#129092;</a>
                <?php } else { ?>
                    <a href="">&#129092;</a>
                <?php } ?>

                <?php for ($i = 1; $i <= $jumlahhalaman; $i++): ?>

                    <?php if ($i == $halamanaktif): ?>

                        <a href="?halaman = <?= $i; ?>">
                            <?= $i; ?>
                        </a>

                    <?php else: ?>

                        <a href="?halaman = <?= $i; ?>">
                            <?= $i; ?>
                        </a>

                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($halamanaktif < $jumlahhalaman) { ?>
                    <a href="?halaman=<?= $halamanaktif + 1; ?>">&#129094;</a>
                <?php } else { ?>
                    <a href="">&#129094;</a>
                <?php } ?>
            </div>
            <!-- end pagination -->


            <!-- table  -->
            <table>

                <tr>
                    <th>No</th>
                    <th>Nama siswa</th>
                    <th>Mata Pelajaran</th>
                    <th>jensi nilai</th>
                    <th>nilai</th>
                    <!-- w -->

                    <?php if ($_SESSION['level'] == '1') { ?>
                        <th>aksi</th>
                    <?php } ?>

                </tr>

                <tr>
                    <!-- pencarian  -->
                    <?php
                    if (isset($_GET['cari'])) {
                        // and level_user= '2'
                        $cari = $_GET['cari'];
                        $filterp = mysqli_query($koneksi, "SELECT grades.*, student.nama, mapel.deskripsi FROM grades INNER JOIN student ON grades.student_id = student.id INNER JOIN mapel ON grades.subject_id = mapel.id WHERE (grades.id LIKE '%" . $cari . "%' or student.nama LIKE '%" . $cari . "%' or grades.subject_id LIKE '%" . $cari . "%' ) ");

                        $no = 1;
                        while ($row = mysqli_fetch_array($filterp)) { ?>



                            <td>
                                <?php echo $no ?>
                            </td>

                            <td>
                                <?php echo $row['nama']; ?>
                            </td>

                            <td>
                                <?php echo $row['deskripsi']; ?>
                            </td>

                            <td>
                                <?php echo $row['jenis_nilai'] ?>
                            </td>

                            <td>
                                <?php echo $row['nilai']; ?>
                            </td>

                            <?php if ($_SESSION['level'] == '1') { ?>
                                <td>
                                    <form action="editdata.php" method="get" class="button">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <input type="submit" name="edit" id="edit" value="edit" style="cursor:pointer;">
                                    </form>
                                    <form action="" action="get" class="button">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <input type="submit" name="hapus" id="hapus" value="hapus" style="cursor:pointer;">
                                    </form>

                                </td>
                            <?php } ?>

                        </tr>

                        <?php $no++;
                        } ?>

                <?php } else if (isset($_GET['cari']) == null) {
                        if (mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while ($row = mysqli_fetch_array($result)) { ?>

                                <tr>
                                    <td>
                                    <?php echo $no ?>
                                    </td>

                                    <td>
                                    <?php echo $row['nama']; ?>
                                    </td>

                                    <td>
                                    <?php echo $row['deskripsi']; ?>
                                    </td>

                                    <td>
                                    <?php echo $row['jenis_nilai'] ?>
                                    </td>

                                    <td>
                                    <?php echo $row['nilai']; ?>
                                    </td>

                                <?php if ($_SESSION['level'] == '1') { ?>
                                        <td>
                                            <form action="editdata.php" method="get" class="button">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <input type="submit" name="edit" id="edit" value="edit" style="cursor:pointer;">
                                            </form>
                                            <form action="" action="get" class="button">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <input type="submit" name="hapus" id="hapus" value="hapus" style="cursor:pointer;">
                                            </form>
                                        </td>
                                <?php } ?>

                                </tr>

                            <?php $no++;
                            }
                        }
                    } ?>
            </table>
        </div>

        <div class="kanan">
            <div class="atas">
                <div id="chart">

                </div>
            </div>
            <div class="bawah">

            </div>
        </div>

    </div>
</body>

</html>

<script>
    var options = {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'sales',
            data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
        }],
        xaxis: {
            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>