<?php
session_start();
$config = require '../config.php';

require '../classes/Connection.php';

$db = Connection::connect($config["database"]);

$sql = "SELECT * FROM `user` WHERE `fullname` LIKE ? OR `username` LIKE ?";

// "SELECT * FROM `user` WHERE `fullname` LIKE ? OR `username` LIKE ?"

$stmt = $db->prepare($sql);
$stmt->execute(["%".$_POST["search"]."%", "%".$_POST["search"]."%"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }