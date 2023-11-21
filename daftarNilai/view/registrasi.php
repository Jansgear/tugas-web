<?php
@include('../support/database.php');
@include('../support/function.php');

if (isset($_POST["register"])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $level = $_POST['level'];

    if (registrasi($_POST) > 0) {
        echo "<div class='cards'>
                alert('registrasi berhasil');
            </div";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
        exit;
    } else {
        echo "<div class='cards'>
                    &times;
                    registrasi gagal
                </div>";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div>
            <form action="" method="post">
                <input type="text" name="username" id="">
                <input type="password" name="password" id="">
                <input type="password" name="password2" id="">
                <input type="text" name="level" id="">

                <input type="submit" name="register" id="">
            </form>
        </div>
    </div>
</body>

</html>