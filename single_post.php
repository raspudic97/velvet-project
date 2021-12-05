<?php 
    require 'bootstrap.php';

    if(!isset($_SESSION['user'])) {
        header("Location: login_register.php");
    }

    if(isset($_POST['comment_post_id'])) {
        $comment -> addComment($_POST['comment_post_id']);
        header("Location: single_post.php?post_id=".$_POST['comment_post_id']."#goHere");
    }

    if(isset($_GET['post_id'])) {
        $single_post = $post -> getSinglePost($_GET['post_id']);
        $comments =$comment -> getAll($_GET['post_id']);
    }

    require 'views/single_post.view.php';