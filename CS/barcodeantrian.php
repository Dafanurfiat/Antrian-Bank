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
</head>
<body>

    <!-- header -->
    <nav class="blue darken-2" style="margin-bottom: 70px">
        <div class="container">
            <div class="nav-wrapper">
                <a href="antrian.php" title="Halaman Awal" class="brand-logo"><i class="material-icons">touch_app</i>BNI</a>
            </div>
        </div>
    </nav>
    <!-- end header -->

    <!-- body -->
    <div class="container">
        <h3 class="header center">Nomor Antrian: <?= htmlspecialchars($antrianData['nomor']); ?></h3>
        <h4 class="header center">Nomor Antrian Sekarang: <?= htmlspecialchars($nomorAntrianSekarang); ?></h4>
        <h4 class="header center">Status: <?= htmlspecialchars($antrianData['status']); ?></h4>
        <h4 class="header center">Waktu Datang: <?= htmlspecialchars($antrianData['datang']); ?></h4>
        <div class="center">
            <!-- Tampilkan gambar barcode -->
            <img src="<?= $barcodeImagePath ?>" alt="Barcode Antrian">
        </div>
    </div>
    <!-- end body -->
</body>
</html>
