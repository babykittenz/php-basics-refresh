<?php

view('session/create', ['heading' => 'Create Account', 'errors' => $_SESSION['_flash']['errors'] ?? [] ]);