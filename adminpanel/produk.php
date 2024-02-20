<?php 
require "session.php";
require "../koneksi.php";
// query untuk memanggil data produk dari database dengan join table kategori
$queryproduk = mysqli_query($con, "SELECT a.*, b.nama as nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
$jumlahproduk = mysqli_num_rows($queryproduk);
// / query untuk memanggil data kategori dari database
$querykategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahkategori = mysqli_num_rows($querykategori);

// fumgsi untuk mengubah nama foto, yang fotonya  sama
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produk</title>
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
    <div class="container mt-5">
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
           <a href="../adminpanel" class="text-decoration-none text-muted"> 
            <i class="fa-solid fa-house-chimney-window"></i>Home
           </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
            <i class=""></i>Produk
            </li>
            </ol>
        </nav>
    <!-- tambah produk -->
    <div class="my-5 col-12 col-md-6">
            <div class="card  p-3 shadow">
            <h3>Tambah Unit</h3>
            
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama"name="nama" placeholder="Input nama Unit" class="form-control" required >
                    <div>
                    <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control mt-2" required >
                            <option value="">Pilih Kategori mobil</option>
                            <!-- untuk menampilkan nama kategori di option value berdasarkan id table kategori -->
                            <?php  
                            while ($data=mysqli_fetch_array($querykategori)) {
                                ?>
                                    <option value="<?php echo $data['id'];?>"><?php echo $data['nama']; ?></option>

                                <?php
                            }
                            
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control"  name="harga" required>
                    </div>

                    <div>
                    <label for="foto">Foto</label>
                        <input type="file"name="foto" id="foto" class="form-control">
                    </div>

                    <div>
                        <label for="detail">Detail</label>
                        <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div>
                        <label for="ketersediaan_stok">Ketersediaan Stok</label>
                        <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                            <option value="Tersedia">Ready</option>
                            <option value="Habis">Sold Out</option>
                        </select>
                    </div>
                    <div>
                    <button class=" btn original-button mt-3" type="submit" name="simpan_produk">Simpan</button>
                    </div>
                </div>
            </form>

            <!-- validasi backennd nama,kategori dan harga supaya tidak boleh kosong saat menginput produk -->
            <?php

            if (isset($_POST['simpan_produk'])) {
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $harga = htmlspecialchars($_POST['harga']);
                // $foto = htmlspecialchars($_POST['foto']);
                $detail = htmlspecialchars($_POST['detail']);
                $ketersediaan_stok= htmlspecialchars($_POST['ketersediaan_stok']);
                // unnntuk upload foto
                $target_dir = "../image/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir .$nama_file;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $imagesize = $_FILES["foto"]["size"];
                $randomname= generateRandomString(20);
                $newname= $randomname . "." . $imageFileType;


                if($nama==''|| $kategori==''|| $harga==''){
                    ?>
                    <div class="alert alert-warning mt-2" role="alert">
                        Bagian Nama,Kategori dan Foto wajib di isi!
                    </div>
                    <?php
                }
                else {
                    if ($nama_file!='') {
                        if ($imagesize > 500000000) {
                            ?>
                            <div class="alert alert-warning mt-2" role="alert">
                                Ukuran file anda tidak boleh melebihi 5Mb!
                            </div>
                            <?php
                        }
                        else {
                            if ($imageFileType!='jpg' && $imageFileType!='png') {
                                ?>
                            <div class="alert alert-warning mt-2" role="alert">
                                Jenis file wajib JPG ATAU PNG!
                            </div>
                            <?php
                            }
                            else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir .$newname);
                            }
                        }
                    }
                    // query insert ke database tabel produk
                            $querytambah = mysqli_query($con, "INSERT INTO 
                            produk(kategori_id,nama,harga,foto,detail,ketersediaan_stok) 
                            VALUES(' $kategori', '$nama', '$harga', '$newname.', '$detail', '$ketersediaan_stok')");

                            if ($querytambah) {
                                ?>
                             <div class="alert alert-success mt-2" role="alert">
                                 Unit berhasil ditambahkan
                            </div>
                       <meta http-equiv="refresh" content="1; url=produk.php" />
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
        
        <div class="mt-3 mb-5">
            <h2>List Unit</h2>
            <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Ketersediaan Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                       
                       // perkondisian untuk mencetak nama dan nomer ke dalam table 1
                      if ($jumlahproduk==0) {
                       ?>
                       <tr>
                          <td colspan=6 class="text-center">Data Unit Tidak Tersedia</td>
                       </tr>
                       <?php   
                      }
                     else {
                         // untuk mengset nomer di mulai dari 1
                         $jumlah= 1;
                         while ($data= mysqli_fetch_array($queryproduk)) {
                        ?>
                            <tr class="text-center">
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['nama_kategori']; ?></td>
                                <td><?php echo $data['harga']; ?></td>
                                <td><?php echo $data['ketersediaan_stok']; ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                    <a href="produkdetail.php?Muxxx=<?php echo $data['id'];?>" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                    
                        <?php

                        $jumlah ++;
                     }

                    }

                     ?>
                      
            </tbody>
            </tale>
            </div>
        </div>

        
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>  
</body>
</html>