<?php
session_start();
//Database connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'velvet';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 
 
//Toggle data in database

    $comment_id = $_POST['comment_id'];
    $user_id = $_SESSION['user'] -> id;
    $is_liked = $_POST['is_liked'];

    if($is_liked != "true") {
      mysqli_query($conn, "INSERT INTO comment_likes VALUES(NULL,'$comment_id', '$user_id')");
    } else {
      mysqli_query($conn, "DELETE FROM comment_likes WHERE comment_id = '$comment_id' AND user_id = '$user_id'");
    }

?>