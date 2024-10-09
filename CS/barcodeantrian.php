<?php
session_start();
include 'connectDB.php';

// Ambil nomor antrian dari URL
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
    <title>Barcode Antrian</title>
    <?php include '_headtags.php'; ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script>
        // Function to print the queue number
        function printAntrian() {
            window.print();
        }
    </script>
</head>
<body>

    <!-- header -->
    <?php include '_navbar.php'; ?>
    <!-- end header -->

    <!-- body -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="center">
                        <h2>Nomor Antrian Anda</h2>
                    </div>
                    <div class="card-body">
                        <h1 class="center"><?= htmlspecialchars($antrianData['nomor']); ?></h1><br></br>
                        <p class="card-text">Nomor Antrian Sekarang: <?= htmlspecialchars($nomorAntrianSekarang); ?></p>
                        <p class="card-text">Status: <?= htmlspecialchars($antrianData['status']); ?></p>
                        <p class="center"><?= htmlspecialchars($antrianData['datang']); ?></p>
                        <div class="barcode">
                            <!-- Tampilkan gambar barcode -->
                            <img  class="img-fluid d-block mx-auto" style="width:150px;" src="<?= $barcodeImagePath ?>" alt="Barcode Antrian">
                        </div>
                    </div>
                    <div class="center">
                        Terima kasih atas kesabaran Anda
                    </div>
                </div>
                <!-- Add the print button -->
                <div class="center" style="margin-top: 20px;">
                    <button class="btn btn-primary" onclick="printAntrian()">Cetak Antrian</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end body -->
</body>
</html>
