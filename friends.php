<?php
    require_once 'bootstrap.php';

    if(!isset($_SESSION['user'])) {
        header("Location: login_register.php");
    }

    if(isset($_GET['id'])) {
        $user_friends = $friend -> getFriendsById($_GET['id']);
    } else {
        header("Location: index.php");
    }

    require_once 'views/friends.view.php';
    