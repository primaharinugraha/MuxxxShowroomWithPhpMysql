<?php
    require "koneksi.php";
    // memanggil data produk dari database

    $queyproduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muxxx Showroom | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
 <?php  require "navbar.php"; ?>
<!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-start fontcolor">
            <h1 >Muxxx Showroom</h1>
            <h3>Mau cari Mobil apa?</h3>
            <form method="get" action="produk.php">
            <div class="input-group input-group-lg my-3 text-white ">
                <input type="text" class="form-control" name="keyword" required>
                <button type="submit" class="btn button-telusuri ms-1">Telusuri</button>
            </div>
        </form>
        </div>
    </div>
    
    <!--  highlighted kategori  -->
    <div class="container-fluid py-4">
        <div class="container text-center">
            <h3>Kategori Unit Terlaris</h3>
            <div class="row mt-4">
                <div class="col-lg-4 hovered-card ">
                    <div class="highlight-Kategori kategori-terlaris-sedan mt-3 d-flex justify-content-center align-items-center"></div>
                    <h4 class="mt-2"><a class="no-decoration" href="produk.php?kategori=sedan">Sedan</a></h4>
                </div>
                <div class="col-lg-4 hovered-card">
                    <div class="highlight-Kategori kategori-terlaris-suv mt-3 d-flex justify-content-center align-items-center"></div>
                    <h4 class="mt-2"><a class="no-decoration" href="produk.php?kategori=suv">Suv</a></h4>
                </div>
                <div class="col-lg-4 hovered-card">
                    <div class="highlight-Kategori kategori-terlaris-minivan mt-3 d-flex justify-content-center align-items-center"></div>
                    <h4 class="mt-2"><a class="no-decoration" href="produk.php?kategori=Minivan">Minivan</a></h4>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang Muxxx showroom -->
        <div class="container-fluid warna3 py-4">
            <div class="container text-center border border-2 warna4">
                <h3>Tentang Kami</h3>
                <p class="fs-6">
                    Muxxx Showroom adalah destinasi utama bagi para pencinta mobil yang mencari pengalaman tak tertandingi dalam industri otomotif. Dengan lebih dari dua puluh tahun pengalaman, Kami telah menetapkan standar tinggi dalam penjualan mobil premium dan layanan pelanggan yang superior. Kami menawarkan berbagai pilihan mobil dari merek terkemuka, mulai dari yang mewah hingga yang sporty. Dengan tim profesional yang berpengetahuan luas dan ramah, Muxxx Showroom memastikan setiap pelanggan mendapatkan solusi yang sesuai dengan kebutuhan dan keinginan mereka. Dengan fasilitas modern dan desain interior yang elegan, Kami menciptakan lingkungan yang memikat bagi para pengunjungnya..

                </p>
            </div>
        </div>


        <!-- produk -->
    <div class="container-fluid-py4">
        <div class="container text-center mt-3">
            <h3>Unit</h3>
            <div class="row mt-4">
                <!-- perulangan untuk memanggil data produk dari database -->
                <?php while ($data = mysqli_fetch_array($queyproduk)) {?>
                <div class="col-sm-6 col-lg-4 mb-3">
                <div class="card hovered-card h-100">
                   <div class="image-box">
                   <img src="image/<?php  echo $data ['foto'];?>" class="card-img-top" alt="...">
                   </div>
                    <div class="card-body shadow">
                        <h4 class="card-title"><?php  echo $data ['nama'];?></h4>
                        <p class="card-text text-truncate"><?php  echo $data ['detail'];?></p>
                        <p class="card-text text-harga">Rp.<?php  echo $data ['harga'];?></p>
                        <a href="produkdetail.php?nama=<?php  echo $data ['nama']; ?>" class="btn warna2 text-white">Lihat Detail</a>
                    </div>
                  </div>
                </div>
        <?php } ?>
        
            </div>
            <a class=" btn original-button mb-2" href="produk.php">Lihat Lainnya</a>
        </div>
    </div>
<!-- footer -->

<?php  require "footer.php"; ?>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>  
</body>
</html>