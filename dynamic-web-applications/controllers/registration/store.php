<?php

use Core\App;
use Core\PGSQLDatabase;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate form info
if (!Validator::email($email)){
    $errors['email'] = 'Please enter a valid email address';
};

if (!Validator::string($password, 7, 255)){
    $errors['password'] = 'Please enter a password with a length of at least 7 characters';
};

if(!empty($errors)){
    view('registration/create', [
        'errors' => $errors
    ]);
};

$db = App::resolve(PGSQLDatabase::class);
// check if the account already exists
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if($user){
    header('location: /');
    // always exit after sending a header
    exit();
}else{
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    $_SESSION['user'] = [
        'email' => $email,
    ];

    header('location: /');
    exit();
}