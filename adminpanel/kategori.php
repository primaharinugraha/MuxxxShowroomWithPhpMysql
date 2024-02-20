<?php 
require "session.php";
require "../koneksi.php";
// query untuk memanggil data kategori dari database
$querykategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahkategori = mysqli_num_rows($querykategori);






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    
.original-button {
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 1;
  text-decoration: none;
  color: #ffffff;
  font-size: 18px;
  border-radius: 5px;
  width: 100%;
  height: 40px;
  font-weight: bold;
  border-bottom: 4px solid #179e43;
  transition: 0.3s;
  box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.4);
  background-color: #19d256;
}

.original-button:hover {
  box-shadow: 0 0 rgba(0, 0, 0, 0.4);
  border-bottom-width: 2px;
  transform: translateY(3px);
}


    
</style>
<body>
<?php require "navbar.php"; ?>

    <div class="container mt-5 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
           <a href="../adminpanel" class="text-decoration-none text-muted"> 
            <i class="fa-solid fa-house-chimney-window"></i>Home
           </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
            <i class="fa-solid fa-list"></i>Kategori
            </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <div class="card  p-3 shadow">
            <h3>Tambah Kategori</h3>
            
            <form action="" method="post" onsubmit="return validateForm()">
                <div>
                    <label for="kategori"></label>
                    <input type="text" id="kategori"name="kategori" placeholder="Input nama kategori" class="form-control" required>
                    <div>
                        <button class=" btn original-button mt-3" type="submit" name="simpan_kategori">Simpan</button>
                    </div>
                </div>
            </form>

            <!-- memvalidasi supaya menginput nama kategori terlebih dahulu jika ingin menambah kategori -->
              <!-- <script>
                function validateForm() {
                    var kategori = document.getElementById("kategori").value;
                    if (kategori.trim() === "") {
                        alert("Input Nama kategori terlebih dahulu");
                        return false; // menghentikan pengiriman formulir jika input kosong
                    }
                    return true; // jika sudah menginput nama kategori maka funngsi berjalan
                }
            </script> -->
            


            <?php 
            if(isset($_POST['simpan_kategori'])) {
                // variabel  untuk menampung inputan kategori
                $kategori = htmlspecialchars($_POST['kategori']);


                // pengecekan/memfilter supaya nama kategori tidak ada yang sama di database

                $queryfilter = mysqli_query($con, "SELECT nama FROM kategori WHERE nama ='$kategori'");
                // billa yang di input bernilai 1 maka di database sudah ada jika 0 brati belum ada dan bakal berhasil terinput
                $jumlahkategori = mysqli_num_rows($queryfilter);
               
                if ($jumlahkategori > 0) {
                    ?>
                    <div class="alert alert-warning mt-2" role="alert">
                        Kategori sudah ada di database!
                    </div>
                    <?php
                } 
                else {
                    $querysimpankategori = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                    if($querysimpankategori) {
                        ?>
                        <div class="alert alert-success mt-2" role="alert">
                            Kategori baru berhasil ditambahkan
                        </div>
                       <meta http-equiv="refresh" content="1; url=kategori.php" />
                        <?php
                    } 
                    else{
                        echo mysqli_error($con);
                    }
                }
                
            }
            ?>

            </div>
        </div>

        <div class="mt-3">
            <h2>List Kategori</h2>
            <div class="table-responsive mt-4">
                <table class="table table-striped table-bordered">
                    <thead class="text-center">
                        <tr>
                            
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                       
                         // perkondisian untuk mencetak nama dan nomer ke dalam table 1
                        if ($jumlahkategori==0) {
                         ?>
                         <tr>
                            <td colspan=3 class="text-center">Data Kategori Tidak Tersedia</td>
                         </tr>
                         <?php   
                        }
                        else {
                             // untuk mengset nomer di mulai dari
                            $jumlah= 1;
                            while ($data= mysqli_fetch_array($querykategori)) {
                            ?>

                            <tr class="text-center">
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                    <a href="kategoridetail.php?Muxxx=<?php echo $data['id'];?>" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <!-- untuk delete data kategori -->
                                    <form method="post" onsubmit="return confirmDelete()">
                                        <button type="submit" name="delete" value="<?php echo $data['id']; ?>" class="btn btn-danger ms-3"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                             <!-- validasi apaakh yakin  akan menghapus kategori yang di pilih -->
                            <script>
                            function confirmDelete() {
                                return confirm("Apakah Anda yakin akan menghapus kategori ini?");
                            }
                            </script>

                            <?php
                            // jika kondisi terpenuhi maka nomer akan bertambah satu auto increment
                            $jumlah++;
                            }
                        }


                        if (isset($_POST['delete'])) {
                            $id_kategori = $_POST['delete'];
                        
                            // untuk mengecek apakah kategori_id sudah terdaftar sebagai produk
                            $querycheck = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$id_kategori'");
                            $datacount = mysqli_num_rows($querycheck);
                            
                            if ($datacount>0 ) {
                                ?>
                                <div class="alert alert-warning mt-2" role="alert">
                                    Kategori tidak bisa dihapus karena sudah di gunakan di produk
                                </div>
                                <?php
                                die();
                            }

                            // Query untuk menghapus kategori dari database
                            $queryhapuskategori = mysqli_query($con, "DELETE FROM kategori WHERE id = '$id_kategori'");
                        
                            if ($queryhapuskategori) {
                                ?>
                                <div class="alert alert-success mt-2" role="alert">
                                    Kategori berhasil dihapus
                                </div>
                                <?php
                                // Refresh halaman setelah penghapusan
                                echo "<meta http-equiv='refresh' content='1'>";
                            } else {
                                ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    Gagal menghapus kategori
                                </div>
                                <?php
                            }
                        }

                        ?>

                        
                       </tbody>
                </table>
            </div>
        </div>
      </div>






    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>  
</body>
</html>