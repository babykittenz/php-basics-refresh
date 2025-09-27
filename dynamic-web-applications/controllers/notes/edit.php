<?php

use Core\App;
use Core\PGSQLDatabase;

$db = App::resolve(PGSQLDatabase::class);

// grab current user
$currentUserId = 6;

// find the note
$note = $db->query('SELECT * FROM notes WHERE id = :id', [ 'id' => $_GET['id']])->findOrFail();

// set up heading and sanitize
$heading = 'Edit ' . htmlspecialchars($note['title']);

// check if the user is authorized to view note if not send them to the unauthorized page
authorize($note['user_id'] === $currentUserId);

view('notes/edit', ['heading' => $heading, 'errors' => [], 'note' => $note]);