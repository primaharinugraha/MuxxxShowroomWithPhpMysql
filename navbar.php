<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-iEJA3PkYJ6tRipXc7U2uH2l2wI0EwA4GsWJbghRo+WhImCXBfPjF5rgj1B3jRGdyyheTLF0byG2DDW4YflZC8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  /* .navbar-gradient {
    background-image: linear-gradient(90deg, rgba(57, 210, 248, 1), rgba(48, 97, 96, 1));
  } */

  .navbar-nav .nav-link {
    font-weight: bold;
    position: relative;
    overflow: hidden;
  }

  .navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 2px;
    bottom: 0;
    left: 0;
    background-color: white;
    transition: transform 0.3s;
    transform: scaleX(0); /* Menyembunyikan garis bawah saat tidak dihover */
    transform-origin: left;
    
  }

  .navbar-nav .nav-link:hover::after {
    transform: scaleX(1); /* Memperluas garis bawah saat dihover */
  }

  .btn-logout{
    color:white;
  }

  

  

  
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-dark shadow p-3  warna1">
  <a class="navbar-brand ms-2" href="#"><span>Muxxx Showroom <i style=" font-weight: bolder;" class="fas fa-car-alt"></i></span></a>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="container">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 "> 
        <li class="nav-item">
          <a class="nav-link me-5" href="index.php">Home</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link" href="produk.php">Produk</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link" href="adminpanel/login.php">Admin Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
