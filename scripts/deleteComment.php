<?php
    require_once 'db_connection.php';
 
    //Remove post from database

    $comment_id = $_POST['comment_id'];

    mysqli_query($conn, "DELETE FROM comments WHERE id = '$comment_id'");
