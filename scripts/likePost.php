<?php
    require_once 'db_connection.php';
 
//Toggle data in database

    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user'] -> id;
    $is_liked = $_POST['is_liked'];

    if($is_liked != "true") {
      mysqli_query($conn, "INSERT INTO post_likes VALUES(NULL,'$post_id', '$user_id')");
    } else {
      mysqli_query($conn, "DELETE FROM post_likes WHERE post_id = '$post_id' AND user_id = '$user_id'");
    }

?>