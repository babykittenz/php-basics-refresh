<?php
$heading = 'Notes';

$config = require 'config.php';
$db = new PGSQLDatabase($config['database']);

$notes = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->fetch();

require "views/note.view.php";