<?php 
require "session.php";
require "../koneksi.php";

// mengambil data jumlah kategori dan produk dari database
$querykategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahkategori = mysqli_num_rows($querykategori);

$queryproduk = mysqli_query($con, "SELECT * FROM produk");
$jumlahproduk = mysqli_num_rows($queryproduk);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .kotak{
        border:1px solid;
    }

    .summary-kategori{
        background-color:#0a6b4a;
        border-radius:10px;
    }
    .summary-produk{
        background-color:#0a516b;
        border-radius:10px;
    }
</style>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5 ">
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
            <i class="fa-solid fa-house-chimney-window"></i>Home
            </li>
            </ol>
    </nav>
    <h2>hallo <?php  echo $_SESSION['ussername'];?></h2>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mb-3 ">
                <div class="summary-kategori  p-4">
                <div class="row">
                    <div class="col-6">
                    <i class="fa-solid fa-list fa-6x text-white"></i>
                    </div>
                    <div class="col-6 text-white">
                        <h2 class="fs-2">Kategori</h2>
                        <p class="fs-4"><?php  echo $jumlahkategori;?> Kategori</p>
                        <p><a href="kategori.php" class="text-white text-decoration-none">Lihat Detail</a></p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class=" summary-produk p-4">
                <div class="row">
                    <div class="col-6">
                    <i class="fa-solid fa-car fa-6x text-white"></i>
                    </div>
                    <div class="col-6 text-white">
                        <h2 class="fs-2">Unit</h2>
                        <p class="fs-4"><?php  echo $jumlahproduk;?> Units</p>
                        <p><a href="produk.php" class="text-white text-decoration-none">Lihat Detail</a></p>
                    </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
    </div>


    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>