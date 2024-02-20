<?php

session_start();
require "../koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<style>
    .main{
        height: 80vh;
      
    }

    .login-message {
        margin-left: 20px; 
        text-align: left;
    }
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
    <div class="container mt-5 ">
        <div class=" main d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card p-5 shadow ">
                    <div class="">
                    <h5 class="text-center text-dark mb-2"><span>Muxxx Showroom Admin <i class="fas fa-car-alt"></i></span></h5>
                    </div>
                   
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="ussername" class="form-label">Ussername</label>
                                <input type="text" class="form-control" name="ussername" id="ussername" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password"  required>
                            </div>
                            <button type="submit" name="loginbtn" class=" btn original-button">Login</button>
                        </form>
                    </div>
                    <div class="mt-3 login-message">
                        <?php
                        if (isset($_POST['loginbtn'])) {
                            $ussername = htmlspecialchars($_POST['ussername']);
                            $password = htmlspecialchars($_POST['password']);
                            
                            // untuk mengecek ussername dan password yang di input sudah sesuai dengan yang di database atau belum 
                              

                            $query = mysqli_query($con, "SELECT * FROM users WHERE ussername='$ussername'");
                            $countdata = mysqli_num_rows($query);
                            $data = mysqli_fetch_array($query);
                            
                            if ($countdata>0) {
                                if (password_verify($password, $data['password'])) {
                                    $_SESSION['ussername'] = $data['ussername'];
                                    $_SESSION['login'] = true;
                                    header('location: ../adminpanel'); 
                                   
                                }
                                else{
                                    ?>
                                <div class="alert alert-danger" role="alert">
                                 Password anda salah!!
                              </div>
                              <?php
                                }

                            }
                            else{
                                ?>
                                <div class="alert alert-danger" role="alert">
                                Ussername anda salah!!
                              </div>
                              <?php
                            }
                        }

                        ?>


                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>