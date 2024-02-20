<?php 
    // untuk memkasa user login, jika belum login akan di tendang ke halaamn login.php
    session_start();
    if ($_SESSION['login']==false) {
        header('location: login.php');  
    }


?>