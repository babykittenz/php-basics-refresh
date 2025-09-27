<?php

use Core\Validator;
use Core\PGSQLDatabase;
use Core\App;

$db = App::resolve(PGSQLDatabase::class);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}
if(!Validator::string($_POST['title'], 1, 25 )){
    $errors['title'] = 'Please enter a title with a length of at least 1 character and less than 25 characters';
}

if (! empty($errors)) {
    view("notes", [
        'heading' => 'Notes',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body, user_id, title) VALUES(:body, :user_id, :title)', [
    'body' => $_POST['body'],
    'title' => $_POST['title'],
    'user_id' => 6
]);

header('location: /notes');
die();