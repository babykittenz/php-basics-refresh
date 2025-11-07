<?php

use Core\App;
use Core\PGSQLDatabase;
use Http\Forms\LoginForm;

$db = App::resolve(PGSQLDatabase::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if(!$form->validate($email, $password)){
        view('session/create', [
            // grab the errors from the form class
            'errors' => $form->errors(),
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
