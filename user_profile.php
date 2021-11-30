<?php
    require_once 'bootstrap.php';

    if(isset($_GET['id'])) {
        $user_posts = $post -> getPostsByUserId($_GET['id']);
        $this_user = $user -> getUserById($_GET['id']);
        $is_friend = $friend -> isFriend($_GET['id']);
     } else {
         header("Location: index.php");
     }

    require_once 'views/user_profile.view.php';