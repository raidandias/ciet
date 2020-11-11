<?php

require '../Rest.php';
require '../User.php';

$api = new Rest();
$user = new User();

if(!$user->list()) {
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


