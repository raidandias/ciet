<?php

$location = [
    'França' => 'Paris',
    'Ingraterra' => 'Londres',
    'Alemanha' => 'Berlim',
    'Rússia' => 'Moscou',
    'Áustria' => 'Viena' 
];

if(empty($location)) {
    echo 'Dados não informados';
    return false;
}

asort($location);

foreach ($location as $country => $city) {
    echo "<p>A Capital da <b>{$country}</b> é <b>{$city}</b>.</p>";
}