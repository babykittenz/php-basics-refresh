<?php

use Core\App;
use Core\PGSQLDatabase;
use Core\Validator;

$db = App::resolve(PGSQLDatabase::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)){
    $errors['email'] = 'Please enter a valid email address';
};

if (!Validator::string($password)){
    $errors['password'] = 'Please provide a valid password';
};

if(!empty($errors)){
    view('session/create', [
        'errors' => $errors
    ]);
};

$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

if($user){
    if(password_verify($password, $user['password'])){
        login([
            'email' => $email,
        ]);

        header('location: /');
        exit();
    }
}

return view('session/create', [
    'errors' => [
        'password' => 'No matching account for that email and password'
    ]
]);
