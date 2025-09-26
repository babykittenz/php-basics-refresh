<?php

use Core\PGSQLDatabase;

$config = require base_path('config.php');
$db = new PGSQLDatabase($config['database']);

$notes = $db->query('SELECT * FROM notes')->getOrFail();

view('notes/index', ['heading' => 'Notes', 'notes' => $notes]);