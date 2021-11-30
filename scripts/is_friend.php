<?php
session_start();
$config = require '../config.php';

require '../classes/Connection.php';

$db = Connection::connect($config["database"]);

$user_id = $_POST['user_id'];
$user_id2 = $_SESSION['user'] -> id;

$sql = "SELECT is_friend FROM `friends` WHERE (user_id = $user_id OR user_id2 = $user_id) AND (user_id = $user_id2 OR user_id2 = $user_id2)";

$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();

if (isset($_POST["ajax"])) { echo json_encode($result); }