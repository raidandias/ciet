<?php

require '../Rest.php';
require '../User.php';

$api = new Rest();
$user = new User();

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$user->name = $post['name'];
$user->last_name = $post['last_name'];
$user->email = $post['email'];
$user->phone = $post['phone'];

if(!$user->save(true)) {
  $api->call(
        '200', 
        'error',
        $user->getMessage(),
        'error'
    )->back();
    return;
}

$api->call(
    '200',
    'success',
    'Usuário criado com sucesso.',
    'success'
)->back((array) $user->data());
return;


