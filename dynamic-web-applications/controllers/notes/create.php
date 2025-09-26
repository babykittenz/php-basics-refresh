<?php

use Core\Validator;
use Core\PGSQLDatabase;

$config = require base_path('config.php');
$db = new PGSQLDatabase($config['database']);

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){



    // grab the data from the form
    $title = $_POST['title'];
    $body = $_POST['body'];
    $currentUserId = 6;

    //***** server side validation ****\\
    // check if the title or body fit the requirements
    if(!Validator::string($title, 1, 25 )){
        $errors['title'] = 'Please enter a title with a length of at least 1 character and less than 25 characters';
    }
    if(!Validator::string($body, 1, 1000)){
        $errors['body'] = 'Please enter a body with a length of at least 1 character and less than 1000 characters';
    }

    // if there are no errors, insert the data into the database
    if(empty($errors)){
        // using prepared statements to prevent SQL injection
        $db->query('INSERT INTO notes (title, body, user_id) VALUES (:title, :body, :user_id)', [
            'title' => $title,
            'body' => $body,
            'user_id' => $currentUserId,
        ]);
    }

}

view('notes/create', ['heading' => 'Create Note', 'errors' => $errors]);