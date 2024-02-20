<?php

require "session.php";
require "../koneksi.php";
// query untuk membaca kategori apa yang sedang kita pilih
$id= $_GET['Muxxx'];

$query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
$data = mysqli_fetch_array($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
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
    <?php  require "navbar.php";?>
    <div class="container">
       <div class="col-12 col-md-6">
          <div class="card  p-3 shadow mt-5">
            <h2>Detail Kategori</h2>
        <form action="" method="post">
            <div>
            <label for="kategori">kategori</label>
            <input type="text"name="kategori" id="kategori" class="form-control" value="<?php echo $data['nama'];?>">
            </div>
            <div class="mt-4">
                <button type="submit" class="btn original-button" name="edit">Edit</button>
            </div>
            </div>
        </form>

        <?php 
        // unntuk membaca apa yang di ketik user
        if (isset($_POST['edit'])) {
            $kategori = htmlspecialchars($_POST['kategori']);
            // jika user tidan mengedit atau tetap sama nama kategori dengan yang sebelumnya, maka hanya refresh halaman ke halaman kategori.php
            if ($data['nama']==$kategori) {
                ?>
                <meta http-equiv="refresh" content="1; url=kategori.php" />
               <?php
               }
            //    pengecekan yang di input oleh user sudah ada atau belum data kategori di database
               else {
                    $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
                    $jumlahdata = mysqli_num_rows($query);
                   
                    // jika kategori sudah ada
                    if ($jumlahdata > 0) {
                        ?>
                        <div class="alert alert-warning mt-2" role="alert">
                            Kategori sudah ada di database!
                        </div>
                        <?php
                    }
                    // kalau kategori belum ada
                    else {
                        $querysimpankategori = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");
                    if($querysimpankategori) {
                        ?>
                        <div class="alert alert-success mt-2" role="alert">
                            Kategori baru berhasil di Update
                        </div>
                       <meta http-equiv="refresh" content="1; url=kategori.php" />
                        <?php
                    } 
                    else{
                        echo mysqli_error($con);
                    }
                    }
               }

        }
        
        ?>
        </div>
    </div>
    
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>