<?php 
require_once 'bootstrap.php';

if(isset($_SESSION['user'])) {
    header("Location: index.php");
}

if(isset($_POST['register-btn'])) {
    $user -> registerUser();
} elseif(isset($_POST['login-btn'])) {
    $user -> logUser();
}

require_once 'views/login_register.view.php';