<?php
    session_start();
    //Database connection
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'velvet';
    $db = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($db); 
 
    //Remove post from database

    $comment_id = $_POST['comment_id'];

    mysqli_query($db, "DELETE FROM comments WHERE id = '$comment_id'");
