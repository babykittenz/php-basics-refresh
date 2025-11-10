<?php

use Core\Session;
use Http\Forms\LoginForm;
use Core\Authenticator;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if($form->validate($email, $password)){

    if((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'No matching account for that email and password');
};

Session::flash('errors', $form->errors());
Session::flash('old', [
    'email' => $email,
]);

redirect('/login');