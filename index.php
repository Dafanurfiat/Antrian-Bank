<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_headtags.php'; ?>
    <title>Login | AntrianKu</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- Header -->
    <nav class="orange darken-2">
    <div class="nav-container">
        <div class="nav-wrapper">
            <!-- Logo BNI di dalam navigation -->
            <a href="index.php" title="Halaman Awal" class="brand-logo">
                <img src="asset/bni.png" alt="BNI Logo" style="width: 150px; vertical-align: middle;">
            </a>
        </div>
    </div>
</nav>
<br><br>
    <!-- End Header -->

    <!-- Main Content Section -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header text-center">SELAMAT DATANG, SILAHKAN PILIH LAYANAN</h4>
                        <div class="card-content">
                            <form action="" method="post">
                                <ul class="list-unstyled">
                                    <li style="padding-bottom: 20px;">
                                        <a class="btn btn-large orange darken-2 btn-block"
                                            href="http://localhost/antrianku-master/Teler/antrian.php">
                                            <p>Antrian Teller</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-large orange darken-2 btn-block"
                                            href="http://localhost/antrianku-master/CS/antrian.php">
                                            <p>Antrian Customer Service</p>
                                        </a>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>