<?php
@include('sidebar.php');
// @include('../../support/database.php');
// session_start();

$datasiswa = "SELECT * FROM student";
$result = mysqli_query($koneksi, $datasiswa) or die($koneksi);


if (isset($_GET['hapus'])) {

    // echo '<div>
    //         <form method="get">
    //             <input type="submit" name="yes" value="yes" id="">
    //             <input type="submit" name="no" value="no" id="">
    //         </form>
    //     </div>';

    // if (isset($_GET['yes'])) {
    //     $studentid = $_GET['id'];
    //     $hapus = "DELETE  FROM `student` WHERE `id` = '$studentid' ";
    //     $hapushasil = mysqli_query($koneksi, $hapus) or die($koneksi);
    // } else if (isset($_GET['no'])) {
    //     return false;
    // }

    $studentid = $_GET['id'];
    $hapus = "DELETE  FROM `student` WHERE `id` = '$studentid' ";
    $hapushasil = mysqli_query($koneksi, $hapus) or die($koneksi);
}
;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../public/css/siswa/data.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="judul">
                <h2>Data Siswa</h2>
                <a href="tambah.php"><i class="fa-solid fa-user-plus fa-xl"></i></a>
            </div>
            <div class="atas">



                <div class="cari">

                    <form action="" method="get">

                        <input type="text" name="cari" value="<?php if (isset($_GET['cari'])) {
                            echo $_GET['cari'];
                        } ?>" placeholder="Masukkan pencarian...">
                        <input type="submit">

                    </form>

                </div>

                <div class="filte">
                    <form action="" method="get">
                        <select name="filter" id="">
                            <option value="nama">nama</option>
                            <option value="kelas">kelas</option>
                        </select>
                    </form>
                    <input type="submit" name="" id="">
                </div>

            </div>

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

            <!-- table -->
            <table>

                <tr>
                    <th>No</th>
                    <th>Nomor Induk</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <!-- w -->

                    <?php //if ($_SESSION['level'] == '1') { ?>
                    <th>aksi</th>
                    <?php //} ?>

                </tr>

                <tr>
                    <?php
                    if (isset($_GET['cari'])) {
                        // and level_user= '2'
                        $cari = $_GET['cari'];
                        $data = mysqli_query($koneksi, "SELECT * FROM student WHERE (id LIKE '%" . $cari . "%' or nomor_induk LIKE '%" . $cari . "%' or nama LIKE '%" . $cari . "%' ) ");
                    } else if (isset($_GET['filter'])) {
                        // $filter = $_GET['filter'];
                        $data = mysqli_query($koneksi, "SELECT * FROM student ORDER BY nama");
                    } else {
                        $data = mysqli_query($koneksi, "SELECT * FROM student");
                    }

                    $no = 1;
                    while ($row = mysqli_fetch_array($data)) {
                        ?>

                        <td>
                            <?php echo $no ?>
                        </td>

                        <td>
                            <?php echo $row['nomor_induk']; ?>
                        </td>

                        <td>
                            <?php echo $row['nama']; ?>
                        </td>

                        <td>
                            <?php echo $row['alamat'] ?>
                        </td>

                        <td>
                            <?php echo $row['tanggal_lahir']; ?>
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


            </table>

        </div>
    </div>
</body>

</html>