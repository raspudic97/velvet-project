<?php
session_start();
$config = require 'config.php';

require './classes/Connection.php';

$db = Connection::connect($config["database"]);

require './classes/QueryBuilder.php';
require './classes/User.php';
require './classes/Post.php';
require './classes/Comment.php';
require './classes/Friend.php';
require './classes/Messages.php';

$query = new QueryBuilder($db);
$user = new User($db);
$post = new Post($db);
$comment = new Comment($db);
$friend = new Friend($db);
$messages = new Messages($db);
