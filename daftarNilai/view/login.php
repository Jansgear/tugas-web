<?php
error_reporting(0);
@include('../support/database.php');
session_start();

if ($_SESSION['login'] == 'true') {
    header('location:home.php');
    return;
}

if (isset($_POST['login'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // echo "SELECT * FROM user WHERE username = '$username' ";

    $cekData = "SELECT * FROM user WHERE username = '$username' ";
    $result = mysqli_query($koneksi, $cekData);

    $row = mysqli_fetch_array($result);

    // echo mysqli_fetch_array($result);

    // echo password_verify($password, $row['password']);

    if ($row) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['level'] = $row['level'];

            $_SESSION['login'] = true;

            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.php">';
            exit;
        } else {
            // echo "<div class='cards'>
            //         &times;
            //         username/password anda salah silahkan coba lagi!!
            //     </div>";
            echo 'username atau password salah';
        }

    } else {
        echo 'username atau password salah';
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../public/css/logins.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="judul">
            <h2>LOGIN</h2>
        </div>
        <div class="input">
            <form method="post">
                <input type="text" name="username" spellcheck="false" placeholder="username" id="inp"><br>
                <!-- <label for="username">Username</label> -->

                <input type="password" name="password" spellcheck="false" placeholder="password" id="inp"><br>
                <!-- <label for="password">Password</label> -->

                <input type="submit" name="login" value="submit" id="btn">
            </form>
        </div>
    </div>
</body>

</html>