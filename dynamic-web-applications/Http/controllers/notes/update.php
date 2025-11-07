<?php

use Core\Validator;
use Core\PGSQLDatabase;
use Core\App;

$db = App::resolve(PGSQLDatabase::class);

// grab current user
$currentUserId = 16;

$noteId = $_POST['id'] ?? $_GET['id'] ?? null;

// find the note
$note = $db->query('SELECT * FROM notes WHERE id = :id', [ 'id' => $noteId])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}
if(!Validator::string($_POST['title'], 1, 25 )){
    $errors['title'] = 'Please enter a title with a length of at least 1 character and less than 25 characters';
}

if (count($errors)) {
    return view('notes/edit', [
        'heading' => 'Edit ' . htmlspecialchars($note['title']),
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes set body = :body, title = :title WHERE id = :id',[
    'body' => $_POST['body'],
    'title' => $_POST['title'],
    'id' => $noteId
]);

header('location: /notes');
die();