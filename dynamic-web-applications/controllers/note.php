<?php


$config = require 'config.php';
$db = new PGSQLDatabase($config['database']);
$heading = "Note";

$note = $db->query('SELECT * FROM notes WHERE id = :id', [ 'id' => $_GET['id']])->fetch();


if(!$note) {
    abort(Response::NOT_FOUND);
}

if($note['user_id'] !== 6) {
    abort(Response::FORBIDDEN);
}else{
    $heading = $note['title'];
}

require "views/note.view.php";