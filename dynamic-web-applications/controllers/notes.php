<?php

$heading = 'Notes';

$config = require 'config.php';
$db = new PGSQLDatabase($config['database']);

$notes = $db->query('SELECT * FROM notes')->fetchAll();

require "views/notes.view.php";