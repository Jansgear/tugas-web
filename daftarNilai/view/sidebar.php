<?php
// error_reporting();
include('../support/database.php');
session_start();

$id = $_SESSION['id'];

$ambil = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($koneksi, $ambil) or die($koneksi);
$row = mysqli_fetch_array($result);
?>

<html>

<head>

    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="../public/css/sidebars.css">

    <script src="https://kit.fontawesome.com/94697881d7.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="sidebar">

        <div class="logo-conten">
            <div class="logo">
                <img style="width:50px; height:50px;" src="../img/2.png" alt="">
                <div class="logo-name">ENTER PRICE</div>
            </div>
        </div>

        <i class="fa-solid fa-bars" id="butt"></i>

        <a href="profiles.php">
            <img src="../img/<?php echo $row['image_user']; ?>" alt="PROFILE" class="profile">
        </a>


        <!-- <div class="src">
            <i class="fa-solid fa-search"></i>
            <div class="bx-search">
                <input type="text" placeholder="search...">
            </div>
        </div> -->

        <ul class="nav">
            <li>
                <a href="home.php">
                    <i class="fa-solid fa-home"></i>
                    <span class="list-name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>

            <?php if ($_SESSION['level'] == '1') { ?>
                <li>
                    <a href="siswa/data.php">
                        <i class="fa-solid fa-user"></i>
                        <span class="list-name">Data Siswa</span>
                    </a>
                    <span class="tooltip">Data Siswa</span>
                </li>
            <?php } ?>

            <li>
                <a href="nilai/data.php">
                    <i class="fa-solid fa-book"></i>
                    <span class="list-name">Daftar Nilai</span>
                </a>
                <span class="tooltip">Daftar Nilai</span>
            </li>

            <li>
                <a href="logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="list-name">Log-out</span>
                </a>
                <span class="tooltip">Log-out</span>
            </li>
        </ul>
    </div>


    <script>
        const btn = document.querySelector("#butt");
        const sidebar = document.querySelector(".sidebar");
        const srcBtn = document.querySelector(".btnsrc");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        }
    </script>
</body>

</html>