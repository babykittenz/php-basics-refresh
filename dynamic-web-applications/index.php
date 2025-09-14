<?php

require 'router.php';
require 'Database.php';

$config = require 'config.php';
$db = new PGSQLDatabase($config['database']);
$id = $_GET['id'];
$query = 'SELECT * from posts where id = :id';

$posts = $db->query($query, [':id' =>$id])->fetch();

print_r($posts);