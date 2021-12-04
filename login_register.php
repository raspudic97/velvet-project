<?php 
require_once 'bootstrap.php';

if(isset($_SESSION['user'])) {
    header("Location: index.php");
}

if(isset($_POST['register-btn'])) {
    $user -> registerUser();
} elseif(isset($_POST['login-btn'])) {
    $user -> logUser();

    if(!$wallet -> isWallet($_SESSION['user'] -> id)) {
        $wallet -> createUserWallet($_SESSION['user'] -> id);
    }
}

require_once 'views/login_register.view.php';