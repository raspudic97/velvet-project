<?php 
    require 'bootstrap.php';

    if(isset($_SESSION['user'])) {
        $posts = $post -> selectAll('post');
    } else {
        header("Location: login_register.php");
    }
    
    if(isset($_POST['createPostBtn'])) {
        $post -> addPost();
        if($post -> error_message == "false") {
            header("Location: index.php");
        }
    }

    require 'views/index.view.php';
?>