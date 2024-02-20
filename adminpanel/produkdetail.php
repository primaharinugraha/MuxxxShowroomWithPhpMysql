
<?php

require "session.php";
require "../koneksi.php";
// query untuk membaca produk apa yang sedang kita pilih
$id= $_GET['Muxxx'];

$query = mysqli_query($con, "SELECT a.*,b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a. id='$id'");
$data = mysqli_fetch_array($query);

$querykategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");
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
    <title>Produk Detail</title>
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
  border-bottom: 4px solid #0d49b8;
  transition: 0.3s;
  box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.4);
  background-color: #2463eb;
}

.original-button:hover {
  box-shadow: 0 0 rgba(0, 0, 0, 0.4);
  border-bottom-width: 2px;
  transform: translateY(3px);
}

 </style> 

<body>
    <?php require "navbar.php"; ?>

    <div class="container">
      <div class="col-12 col-md-6">
       <div class="card  p-3 shadow mt-5 mb-5">
        <h2>Detail Unit</h2>
        <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama"name="nama" value="<?php echo $data['nama']; ?>" class="form-control" required >
        </div>
          <div>
          <label for="kategori">Kategori</label>
          <select name="kategori" id="kategori" class="form-control mt-2" required>
            <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?></option>
            <?php   
              while ($datakategori=mysqli_fetch_array($querykategori)) {
                ?>
                <option value="<?php echo $datakategori['id'];?>"><?php echo $datakategori['nama']; ?></option>

            <?php
              }
            
            ?>
          </select>
            
         </div>
         <div>
            <label for="harga">Harga</label>
            <input type="number" class="form-control" value="<?php echo $data['harga'];?>"  name="harga" required>
         </div>
           <div>
            <label for="currenfoto">Foto unit Saat ini</label>
            <img src="../image/<?php echo $data['foto'];?>" class="form-control" alt="">
           </div>
         <div>
            <label for="foto">Foto</label>
            <input type="file"name="foto" id="foto" class="form-control" value="">
        </div>
        <div>
          <label for="detail">Detail</label>
          <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
          <?php echo $data['detail'];?>
          </textarea>
          </div>
          <div>
            <label for="ketersediaan_stok">Ketersediaan Stok</label>
              <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                <option value="<?php echo $data['ketersediaan_stok'];?>"><?php echo $data['ketersediaan_stok'];?></option>
                <?php
                  if ($data['ketersediaan_stok']=='Tersedia') {
                    ?>
                    <option value="Habis">Sold Out</option>
                    <?php
                  }
                  else {
                    ?>
                      <option value="Tersedia">Ready</option>
                    <?php
                  }

                ?>
            </select>

            <div>
              <button class=" btn original-button mt-3" type="submit" name="simpan_produk">Update</button>
            </div>
          </div>
        </form>

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
            $queryUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori', nama='$nama', harga='$harga', detail='$detail', ketersediaan_stok='$ketersediaan_stok' WHERE id =$id ");

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

                    $querytambah = mysqli_query($con, "UPDATE produk SET foto='$newname' WHERE id='$id'");
                    if ($querytambah) {
                      ?>
                   <div class="alert alert-success mt-2" role="alert">
                       Unit berhasil diUpdate
                  </div>
             <meta http-equiv="refresh" content="1; url=produk.php" />
                      <?php
                  }
                  else {
                    echo mysqli_error($con);
                  }
                    
                }
            }
            }
          }

        }

        ?>
       </div>
      </div>
    </div>
    
    
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>  
</body>
</html>
