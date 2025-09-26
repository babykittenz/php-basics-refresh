<?php

// set up db

$config = require base_path('config.php');
$db = new PGSQLDatabase($config['database']);

// grab current user
$currentUserId = 6;

// find the note
$note = $db->query('SELECT * FROM notes WHERE id = :id', [ 'id' => $_GET['id']])->findOrFail();

// set up heading and sanitize
$heading = htmlspecialchars($note['title']);

// check if the user is authorized to view note if not send them to the unauthorized page
authorize($note['user_id'] === $currentUserId);

view('notes/show', ['heading' => $heading, 'note' => $note]);