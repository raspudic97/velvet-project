<?php
    session_start();
    //Database connection
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'velvet';
    $db = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($db); 
 
    //Remove post from database

    $post_id = $_POST['post_id'];

    mysqli_query($db, "DELETE FROM post WHERE id = '$post_id'");
