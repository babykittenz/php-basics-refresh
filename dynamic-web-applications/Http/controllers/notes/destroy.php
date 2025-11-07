<?php

use Core\App;
use Core\PGSQLDatabase;

// we handle the database as a singleton
$db = App::resolve(PGSQLDatabase::class);

$currentUserId = 16;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();