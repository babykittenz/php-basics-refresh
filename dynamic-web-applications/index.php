<?php

require 'router.php';

$dsn = '';
// connect to postgres database
$pdo = new PDO($dsn);
// prepare statement
$statement = $pdo->prepare('SELECT * from posts');
// execute statement
$statement->execute();
// fetch all results
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

print_r($posts);
