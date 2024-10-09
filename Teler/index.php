<?php

session_start();
include 'connectDB.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=Logi, initial-scale=1.0">
    <?php include '_headtags.php' ?>
    <title>Login | AntrianKu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

<body>

    <!-- header -->
    <?php include "_navbar.php"; ?>
    <!-- end header -->

    <!-- Login Admin -->
    <div class="row justify-content-center" style="margin:2%;">
        <div class="col-12 col-md-6 col-lg-6 card px-3 py-4">
            <h3 class="header center">Silahkan Login Terlebih Dahulu</h3>
            <div class="card-content center">
                <form action="" method="post">
                    <ul>
                        <li>
                            <button class="btn-large orange darken-2" type="button" id="loginButton">Login Sebagai
                                Admin Teller</button>
                        </li>
                    </ul>
                </form>

                <!-- Form Login Admin -->
                <div id="loginForm" class="hidden" style="display: none;">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 card white" style="margin-top: 20px;">
                            <h3 class="header center">Login Admin</h3>
                            <form action="" method="post" class="input-field inline">
                                <ul>
                                    <li><label for="username">Username</label></li>
                                    <li><input type="text" size="40" id="username" name="username"
                                            placeholder="Username" required></li>
                                    <li><label for="password">Password</label></li>
                                    <li><input type="password" id="password" name="password" placeholder="Password"
                                            required></li>
                                    <li><button class="btn-large orange darken-2" type="submit"
                                            name="login">Login</button></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk mengontrol tampilan form -->
    <script>
    document.getElementById("loginButton").addEventListener("click", function() {
        var loginForm = document.getElementById("loginForm");
        loginForm.style.display = (loginForm.style.display === "none" || loginForm.style.display === "") ?
            "block" : "none";
    });
    </script>
</body>

</html>

<?php  

if ( isset($_SESSION["admin"])){
    echo "
        <script>
            Swal.fire('Anda Sudah Login','Silahkan Logout Terlebih Dahulu','warning').then(function(){
                window.location = 'dashboard.php';
            });
        </script>
    ";
}

if (isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek apakah ada karyawan
    $karyawan = mysqli_query($connect, "SELECT * from karyawan");

    // kalau gak ada 
    if (mysqli_num_rows($karyawan) < 1){
        mysqli_query($connect, "INSERT INTO karyawan VALUES ('root','root')");
    }

    // cari berdasarkan username
    $karyawan = mysqli_query($connect, "SELECT * from karyawan where username = '$username'");

    // cek apakah ada username
    if (mysqli_num_rows($karyawan) < 1){
        echo "
            <script>
                Swal.fire('Gagal Login','Username Tidak Ditemukan','error');
            </script>
        ";
        exit;
    }

    $karyawan = mysqli_fetch_assoc($karyawan);

    if ($password != $karyawan['password']){
        echo "
            <script>
                Swal.fire('Gagal Login','Kata Sandi Salah','error');
            </script>
        ";
        exit;
    }

    $_SESSION["admin"] = $username;
    echo "
        <script>
            Swal.fire('Berhasil Login','Anda Akan Dialihkan Ke Halaman Karyawan','success').then(function(){
                window.location = 'dashboard.php';
            });
        </script>
    ";
}

?>