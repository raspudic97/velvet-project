<?php
require 'bootstrap.php';

if(count((array) $user -> getUserById($_GET['id'])) == 1) {
    header("Location: 404.php");
}

if (isset($_SESSION['user'])) {
    $friends = $friend->getFriends();
} else {
    header("Location: login_register.php");
}

if(isset($_GET['id'])) {
    $all_messages = $messages -> getMessages($_GET['id']);
}

if(isset($_POST['send-message-btn'])) {
    $messages -> sendMessage($_GET['id']);
    header("Location: chat.php?id=". $_GET['id']);
} 

require 'views/chat.view.php';
