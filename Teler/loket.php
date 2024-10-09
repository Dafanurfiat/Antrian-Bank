<?php
session_start();
include 'connectDB.php';

$antrian = mysqli_query($connect, "SELECT * from antrian where status = 'mengantri'");

// ambil data yang dilayani
$A = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'A' ORDER BY nomor DESC");
if (mysqli_num_rows($A) < 1){
    $A = 0;
}else{
    $A = mysqli_fetch_assoc($A);
    $A = $A["nomor"];
}

$B = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'B' ORDER BY nomor DESC");
if (mysqli_num_rows($B) < 1){
    $B = 0;
}else{
    $B = mysqli_fetch_assoc($B);
    $B = $B["nomor"];
}

$C = mysqli_query($connect, "SELECT * from antrian where status = 'dilayani' AND loket = 'C' ORDER BY nomor DESC");
if (mysqli_num_rows($C) < 1){
    $C = 0;
}else {
    $C = mysqli_fetch_assoc($C);
    $C = $C["nomor"];
}
$nomorAntrian = isset($_GET['nomor']) ? intval($_GET['nomor']) : 0;

// Mengambil data antrian berdasarkan nomor
$query = "SELECT * FROM antrian WHERE nomor = $nomorAntrian";
$query1 = "SELECT * FROM antrian WHERE status = 'mengantri' ORDER BY nomor ASC LIMIT 1"; // Tambahkan ORDER BY dan LIMIT

$antrianResult = mysqli_query($connect, $query);
$antrianSekarang = mysqli_query($connect, $query1);

$antrianData = mysqli_fetch_assoc($antrianResult);
$antrianDataSekarang = mysqli_fetch_assoc($antrianSekarang);

// Cek apakah ada data antrian yang ditemukan
if (!$antrianData) {
    // Jika tidak ada, tampilkan pesan kesalahan
    echo "<h3>Nomor Antrian tidak ditemukan.</h3>";
    exit();
}

// Cek apakah ada antrian yang "sedang mengantri"
$nomorAntrianSekarang = $antrianDataSekarang ? $antrianDataSekarang['nomor'] : 'Tidak ada antrian saat ini.';

// Path gambar barcode yang sesuai dengan nomor antrian
$barcodeImagePath = "asset/qr_code_{$nomorAntrian}.png";

// Cek apakah file barcode ada
if (!file_exists($barcodeImagePath)) {
    echo "<h3>Barcode untuk nomor antrian ini tidak tersedia.</h3>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_headtags.php' ?>
    <script src="js/jquery.js"></script> 
    <script>
        var refreshId = setInterval(function(){
            $('#tampilAntrian').load('tampilAntrian.php');
        }, 1000);
    </script>
    <style>
        /* Custom Styles for Loket Colors */
        .loket-a {
            background-color: #f44336; /* Red */
            color: white;
            padding: 20px; /* Padding untuk memperpanjang card */
        }
        .loket-b {
            background-color: #4caf50; /* Green */
            color: white;
            padding: 20px; /* Padding untuk memperpanjang card */
        }
        .loket-c {
            background-color: #2196f3; /* Blue */
            color: white;
            padding: 20px; /* Padding untuk memperpanjang card */
        }
        .loket-card {
            padding: 20px; /* Padding untuk card loket */
            min-height: 400px; /* Mengatur tinggi minimum card loket */
        }
    </style>
    <title>Program Antrian</title>
</head>
<body>

    <!-- header -->
    <?php include '_navbar.php'; ?>
    <!-- end header -->

    <!-- Loket Cards in One Container -->
    <div class="container">
        <div class="row">
            <!-- Loket Card -->
            <div class="card loket-card">
                <div class="card-content" style="padding-bottom: 350px;">
                    <h5 class="center" style="margin-top: 1px;">Status Loket Teler</h5>
                    <div class="center">
                        <div class="col s12 loket-a card-panel z-depth-2">
                            <h5 class="header">Loket Teler A</h5>
                            <h5 class="header light"><?= $A ?></h5>
                        </div>
                        <div class="col s12 loket-b card-panel z-depth-2" style="margin-top: 10px;">
                            <h5 class="header">Loket Teler B</h5>
                            <h5 class="header light"><?= $B ?></h5>
                        </div>
                        <div class="col s12 loket-c card-panel z-depth-2" style="margin-top: 10px;">
                            <h5 class="header">Loket Teler C</h5>
                            <h5 class="header light"><?= $C ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Info Antrian -->
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <h5 class="header center">Nomor Antrian Anda</h5>
                    <div class="center">
                        
                            <h5 class="light center"><?= htmlspecialchars($antrianData['nomor']); ?></h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Antrian Sekarang -->
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <h5 class="header center">Nomor Antrian Sekarang</h5>
                    <div class="center">
                        <h5 class="light center"><?= htmlspecialchars($nomorAntrianSekarang); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end body -->
</body>
</html>
