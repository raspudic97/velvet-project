<?php
require_once 'bootstrap.php';

if(count((array) $user -> getUserById($_GET['id'])) == 1) {
    header("Location: 404.php");
}

if(!isset($_SESSION['user'])) {
    header("Location: login_register.php");
}

if(isset($_GET['id']) && isset($_SESSION['user'])) {
    $message = "";

    if ($user->error_message) {
        $message = $user->error_message;
        header("Location: edit_profile.php?id=" . $_SESSION['user']->id);
    }

    if (isset($_POST['edit-profile'])) {
        //Provjera unesenih lozinki
        if ($_POST['old-password'] == "" && $_POST['new-password'] == "" && $_POST['confirm-new-password'] == "") {
            $user->editProfile();
        } else {
            if ($_POST['old-password'] == $user->getUserById($_SESSION['user']->id)->password) {
                $user->editProfile();
            } else {
                $message = "Wrong current password. Try again.";
            }

            if ($_POST['new-password'] == $_POST['confirm-new-password']) {
                $user->editProfile();
            } else {
                $message = "New passwords dont match. Try again";
            }
        }
    }
} else {
    header("Location: index.php");
}

require_once 'views/edit_profile.view.php';
