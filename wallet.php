<?php 
    require_once 'bootstrap.php';

    if(!isset($_SESSION['user'])) {
        header("Location: login_register.php");
    }

    if($_SESSION['user'] -> id != $_GET['id']) {
        header("Location: 404.php");
    }
    
    $transactions = $wallet -> getTransactions($_GET['id']);

    if(isset($_POST['deposit-money-btn'])) {
        $wallet -> depositMoney($_GET['id']);
        header("Location: wallet.php?id=".$_GET['id']);
    }

    require_once 'views/wallet.view.php';