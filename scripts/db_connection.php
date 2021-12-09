<?php

session_start();
//Database connection
$dbhost = 'studenti.sum.ba';
$dbuser = 'pzi202022';
$dbpass = 'csdigital2022';
$db = 'pzi202022';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 