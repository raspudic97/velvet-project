<?php
    require_once 'db_connection.php';

 //Toggle data in database

    $user_id = $_POST['user_id'];
    $user_id2 = $_SESSION['user'] -> id;
    $is_friend = $_POST['is_friend'];

    if($is_friend != "true") {
      mysqli_query($conn, "INSERT INTO friends VALUES(NULL,'$user_id', '$user_id2', 'true')");
    } else {
      mysqli_query($conn, "DELETE FROM friends WHERE (user_id = '$user_id' OR user_id2 = '$user_id') AND (user_id = '$user_id2' OR user_id2 = '$user_id2')");
    }

?>