<?php 
    require_once 'bootstrap.php';

    $transactions = $wallet -> getTransactions($_GET['id']);

    if(isset($_POST['deposit-money-btn'])) {
        $wallet -> depositMoney($_GET['id']);
        header("Location: wallet.php?id=".$_GET['id']);
    }

    require_once 'views/wallet.view.php';