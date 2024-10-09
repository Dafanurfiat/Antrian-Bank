<?php

session_start();
include 'connectDB.php';

$jam = date("H:i:s");

if (isset($_POST["panggilAntrianA"])){
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'A' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0){
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }

    $query = mysqli_query($connect, "SELECT * from antrian where status = 'mengantri'");
    $query = mysqli_fetch_assoc($query);

    $nomorSekarang = $query["nomor"];

    mysqli_query($connect, "UPDATE antrian SET status = 'dilayani', loket = 'A', dilayani = '$jam' where nomor = $nomorSekarang");
}

if (isset($_POST["panggilAntrianB"])){
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'B' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0){
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }

    $query = mysqli_query($connect, "SELECT * from antrian where status = 'mengantri'");
    $query = mysqli_fetch_assoc($query);

    $nomorSekarang = $query["nomor"];

    mysqli_query($connect, "UPDATE antrian SET status = 'dilayani', loket = 'B', dilayani = '$jam' where nomor = $nomorSekarang");
}

if (isset($_POST["panggilAntrianC"])){
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'C' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0){
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }
    

    $query = mysqli_query($connect, "SELECT * from antrian where status = 'mengantri'");
    $query = mysqli_fetch_assoc($query);
    $nomorSekarang = $query["nomor"];

    mysqli_query($connect, "UPDATE antrian SET status = 'dilayani', loket = 'C', dilayani = '$jam' where nomor = $nomorSekarang");
}

if (isset($_POST["selesaiA"])){
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'A' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0){
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }
}

if (isset($_POST["selesaiB"])){
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'B' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0){
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }
}

if (isset($_POST["selesaiC"])){
    $query = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'C' ORDER BY nomor DESC");
    if (mysqli_num_rows($query) > 0){
        $query = mysqli_fetch_assoc($query);
        $nomorSekarang = $query["nomor"];
        mysqli_query($connect, "UPDATE antrian SET status = 'selesai' where nomor = $nomorSekarang");
    }
}

if (isset($_POST['reset'])) {
    // Hapus semua data dari tabel antrian
    $barcodeFiles = glob('asset/*.png'); // Menggunakan relative path jika asset folder di dalam folder proyek
    $deleteQuery = "TRUNCATE TABLE antrian"; // Gunakan DELETE jika ada foreign key
    
    if (mysqli_query($connect, $deleteQuery)) {
        // Jika query berhasil, lanjut menghapus file PNG
        if ($barcodeFiles !== false && count($barcodeFiles) > 0) {
            // Loop hanya jika ada file yang ditemukan
            foreach ($barcodeFiles as $file) {
                if (is_file($file)) {
                    // Menghapus file jika file tersebut valid
                    if (unlink($file)) {
                        echo "<script>console.log('File $file berhasil dihapus.');</script>";
                    } else {
                        // Jika gagal menghapus, tampilkan pesan error
                        echo "<script>console.log('Gagal menghapus file $file: " . error_get_last()['message'] . "');</script>";
                    }
                }
            }
        } else {
            // Jika tidak ada file yang ditemukan, tampilkan pesan ini
            echo "<script>console.log('Tidak ada file yang ditemukan di folder asset.');</script>";
        }
        echo "<script>console.log('Data antrian telah direset.');</script>";
    } else {
        // Jika query gagal
        echo "<script>console.log('Gagal menghapus data antrian: " . mysqli_error($connect) . "');</script>";
    }
}


    // Hapus semua file barcode di folder asset



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_headtags.php' ?>
    <script src="js/jquery.js"></script>
    <script>
    var refreshId = setInterval(function() {
        $('#tampilAntrian').load('tampilAntrian.php');
    }, 1000);
    </script>
    <title>Program Antrian</title>

</head>

<body>

    <!-- header -->
    <?php include '_navbar.php' ?>
    <!-- end header -->

    <!-- body -->
    <div class="row">

        <div class="col s12 m10 offset-m1 card">
            <!-- Card Induk -->
            <div class="card-content">
                <h3 class="header center">Loket Customer Service</h3> <!-- Judul Utama untuk Loket Teller -->
                <div class="row">
                    <div class="col s12 m6">
                        <h4 class="header center">Loket Customer Service A</h4>
                        <form action="" method="post">
                            <div class="center">
                                <button class="btn-large blue darken-2" type="submit"
                                    name="panggilAntrianA">Panggil</button>
                                <button class="btn-large red darken-2" type="submit" name="selesaiA">Selesai</button>
                            </div>
                        </form>
                    </div>

                    <div class="col s12 m6">
                        <h4 class="header center">Loket Customer Service B</h4>
                        <form action="" method="post">
                            <div class="center">
                                <button class="btn-large blue darken-2" type="submit"
                                    name="panggilAntrianB">Panggil</button>
                                <button class="btn-large red darken-2" type="submit" name="selesaiB">Selesai</button>
                            </div>
                        </form>
                    </div>

                    <div class="col s12 m6">
                        <h4 class="header center">Loket Customer Service C</h4>
                        <form action="" method="post">
                            <div class="center">
                                <button class="btn-large blue darken-2" type="submit"
                                    name="panggilAntrianC">Panggil</button>
                                <button class="btn-large red darken-2" type="submit" name="selesaiC">Selesai</button>
                            </div>
                        </form>
                    </div>

                    <div class="col s12 m6">
                        <h4 class="header center">Reset Nomor Antrian</h4>
                        <form action="" method="post" id="resetForm">
                            <div class="center">
                                <button class="btn-large red darken-2" type="submit" name="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tampilan Antrian -->
        <div class="col s12 m10 offset-m1 card">
            <div class="card-content">
                <h3 class="header center">Tampilan Antrian</h3>
                <div id="tampilAntrian"></div>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="col s12 m10 offset-m1">
            <div class="center">
                <a href="logout.php" title="Logout" class="btn-large red darken-2">Logout</a>
            </div>
        </div>
    </div>



</body>

</html>

<?php

if ( !isset($_SESSION["admin"])){
    echo "
        <script>
            Swal.fire('Akses Ditolak','Anda Belum Login Sebagai Karyawan','warning').then(function(){
                document.location.href = 'index.php';
            });
        </script>
    ";
}

?>