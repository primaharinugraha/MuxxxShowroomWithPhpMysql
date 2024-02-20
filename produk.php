<?php
// untuk mendapatkan kategori dari database

require "koneksi.php";
    $querykategori = mysqli_query($con, "SELECT * FROM kategori");


    // get produk by nama produk/keyword
        if (isset($_GET['keyword'])) {
            $queryproduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");    
        }
    // get produk by kategori
    elseif (isset($_GET['kategori'])) {
        $queryGetkategoriid = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
        $kategoriid = mysqli_fetch_array($queryGetkategoriid);
        $queryproduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriid[id]'");
       
    }
    // get produk default
    else {
        $queryproduk = mysqli_query($con, "SELECT * FROM produk");
    }
// untuk mengecek data produk/unit yang di search ada atau tidak di database
    $counddata = mysqli_num_rows($queryproduk);

        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title> Muxxx Showroom | Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php  require "navbar.php"; ?>

        <!-- banner -->
        <section id="banner">
           
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-box">
                <img src="image/audy.jpg" class="w-100 " alt="...">
                <div class="carousel-caption">
                    <h3>Audy</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                    <a href="#" class="btn btn-warning">Read More</a>
                </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-box">
                <img src="image/alphard.jpg" class="w-100 " alt="...">
                <div class="carousel-caption">
                    <h3>Toyota Alphard</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                    <a href="#" class="btn btn-warning">Read More</a>
                </div>
                </div>
            </div>
            <div class="carousel-item ">
                <div class="carousel-box">
                <img src="image/Ferarri.jpg" class="w-100 " alt="...">
                <div class="carousel-caption">
                    <h3>Ferrari</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                    <a href="#" class="btn btn-warning">Read More</a>
                </div>
                </div>
            </div>
         
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</section>
<!-- End Banner Section -->

<!-- body -->

 <div class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <h3>Kategori</h3>
            <div class="list-group">
                <!-- perulanngan untuk mengambil data kategori dari database -->
                <?php while ($kategori = mysqli_fetch_array($querykategori)) {?>
                    <a class="no-decoration" href="produk.php?kategori=<?php  echo $kategori['nama'];?>">
                        <button  class="list-group-item list-group-item-action"><?php  echo $kategori ['nama'];?></button>
                    </a>
                <?php }?>
             </div>
        </div>
        <div class="col-lg-9">
            <h3 class="text-center mb-4">Unit</h3>
                <div class="row">
                <?php
                if ($counddata<1) {
                    ?>
                        <div class="alert alert-warning my-4" role="alert">
                           Unit yang anda cari tidak tersedia.
                        </div>
                    <?php
                }
                
                ?>
                     <!-- perulanngan untuk mengambil data Produk/unit dari database -->
                     <?php while ($produk = mysqli_fetch_array($queryproduk)) { ?>
                    <div class="col-md-4 col-lg-6 mb-3">
                    <div class="card hovered-card h-100 shadow">
                   <div class="image-box">
                   <img src="image/<?php echo $produk['foto']; ?>" class="" alt="...">
                   </div>
                    <div class="card-body">
                        <h4 class="card-title"><?php  echo $produk ['nama'];?></h4>
                        <a href="produkdetail.php?nama=<?php  echo $produk ['nama']; ?>" class="btn warna2 text-white mt-2">Lihat Detail</a>
                    </div>
                  </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
 </div>

 <?php  require "footer.php"; ?>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>