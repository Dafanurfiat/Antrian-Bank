<?php

session_start();
include 'connectDB.php';

date_default_timezone_set('Asia/Makassar');

require 'vendor/autoload.php'; // Autoload Composer

use Endroid\QrCode\Builder\Builder; // Import the QR code builder

if (isset($_POST["antriBaru"])) {
    $jam = date("H:i:s");
    mysqli_query($connect, "INSERT INTO antrian (status, loket, datang, dilayani) VALUES ('mengantri', '', '$jam', '00:00:00')");
    
    if (mysqli_affected_rows($connect) < 1) {
        echo mysqli_error($connect);
    } else {
        $nomorAntrianBaru = mysqli_insert_id($connect);

        // URL to be encoded in the QR code
        $url = "http://localhost/AntrianKu-master/Teler/loket.php?nomor=" . $nomorAntrianBaru;

        // Generate QR code with the URL
        $qrCodeResult = Builder::create()
            ->data($url) // Embed the URL in the QR code
            ->size(300)
            ->margin(10)
            ->build();

        // Path to save the QR code image in the 'asset' folder
        $qrCodeImagePath = 'asset/qr_code_' . $nomorAntrianBaru . '.png';

        // Save QR code to file
        file_put_contents($qrCodeImagePath, $qrCodeResult->getString());

        // Redirect to the QR code display page with the queue number
        header("Location: barcodeantrian.php?nomor=$nomorAntrianBaru");
        exit();
    }
}

$query = "SELECT * FROM antrian WHERE status = 'mengantri' ORDER BY nomor DESC LIMIT 1";
$antrian = mysqli_query($connect, $query);
$nomorAntrian = mysqli_fetch_assoc($antrian);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Antrian</title>
    <?php include '_headtags.php'; ?>
    <script src="js/jquery.js"></script> 
    <script>
        var refreshId = setInterval(function(){
            $('#notasiAntrian').load('notasiAntrian.php');
        }, 1000);
    </script>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>
<body>

    <!-- header -->
    <?php include '_navbar.php'; ?>
    <!-- end header -->

    <!-- body -->
    <div class="row justify-content-center" style="margin:2%;">
    <div class="col-12 col-md-6 col-lg-6 card px-3 py-4 card">
        <h3 class="header center">LOKET TELLER</h3>
        <div class="card-content">
            <form action="" method="post">
                <div class="center">
                    <button class="btn-large orange darken-2" style="margin-bottom:20px;" type="submit" name="antriBaru">Ambil Antrian</button>
                </div>
            </form>
            <h3 class="header center">INFO</h3>
            <div id="notasiAntrian"></div>
        </div>
    </div>
</div>

    <!-- end body -->
</body>
</html>
