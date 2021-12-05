<?php 
    require_once 'bootstrap.php';

    if(!isset($_SESSION['user'])) {
        header("Location: login_register.php");
    }

    require_once 'views/news.view.php';