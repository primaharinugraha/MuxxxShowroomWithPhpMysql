<?php  
// untuk mendapatkan data dari database

require "koneksi.php";
    $nama = htmlspecialchars ($_GET['nama']);
    $queryproduk = mysqli_query($con, "SELECT * FROM produk WHERE nama= '$nama'");  
    $produk = mysqli_fetch_array($queryproduk);

    // query untuk menampilkan produk terkait dari database sesuai kategori

    $queryprodukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' Limit 4");
    
  
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muxxx Showroom | Produk Detail</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php  require "navbar.php"; ?>
<!-- produk detail -->

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <img src="image/<?php echo $produk['foto']; ?>" class="w-100 hovered-card"alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $produk['nama']; ?></h1>
                    <p class="fs-5">
                    <?php echo $produk['detail']; ?>
                    </p>
                    <p class="text-harga fs-3">
                    Rp.<?php echo $produk['harga']; ?>
                    </p>
                    <p>
                        Status ketersediaan : <strong>  <?php echo $produk['ketersediaan_stok']; ?></strong>
                    </p>
                   
                </div>
            </div>
        </div>
    </div>

    <!-- produk terkait -->
   <div class="container-fluid py-5 warna2">
    <div class="container">
        <h2 class="text-center text-white mb-5">Produk Terkait</h2>
        <div class="row">
            <?php while ($data=mysqli_fetch_array($queryprodukTerkait)) { ?>
            <div class="col-md-6 col-lg-3 mb-3 h-100">
                <div class="produkterkait-box">
                <a href="produkdetail.php?nama=<?php echo $data['nama']; ?>">        
                 <img src="image/<?php  echo $data['foto'];?>" class="img-fluid img-thumbnail hovered-card"  alt="">
             </a>
                </div>
            
        </div>

            <?php } ?>
        </div>
    </div>
   </div>


   <?php  require "footer.php"; ?>



    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>