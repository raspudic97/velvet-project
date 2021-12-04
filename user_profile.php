<?php
    require_once 'bootstrap.php';

    if(!isset($_SESSION['user'])) {
        header("Location: login_register.php");
    } 

    if(isset($_POST['send-money-btn'])) {
        $wallet -> sendMoney($_GET['id']);
    }

    if(isset($_GET['id'])) {
        $user_posts = $post -> getPostsByUserId($_GET['id']);
        $this_user = $user -> getUserById($_GET['id']);
        $is_friend = $friend -> isFriend($_GET['id']);
     } else {
         header("Location: index.php");
     }

    require_once 'views/user_profile.view.php';