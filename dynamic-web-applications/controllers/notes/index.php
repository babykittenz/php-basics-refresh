<?php

use Core\App;
use Core\PGSQLDatabase;

$db = App::resolve(PGSQLDatabase::class);

$notes = $db->query('SELECT * FROM notes')->getOrFail();

view('notes/index', ['heading' => 'Notes', 'notes' => $notes]);