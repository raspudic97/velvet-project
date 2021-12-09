<?php
    require_once 'db_connection.php';
 
    //Remove post from database

    $post_id = $_POST['post_id'];

    mysqli_query($conn, "DELETE FROM post WHERE id = '$post_id'");
