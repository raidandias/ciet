<?php

require '../Rest.php';
require '../User.php';

$api = new Rest();
$user = new User();

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$user->email = $post['email'];

if(!$user->delete()) {
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
    $user->getMessage(),
    'success'
)->back((array) $user->data());
return;


