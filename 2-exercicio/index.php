<?php 

function foiMordido() {
    return (rand(0, 100) > 50 ? true : false);
}

$mordido = foiMordido();

if(!$mordido) {
    echo "Joãozinho mordeu o seu dedo !";
} else {
    echo "Joaozinho NAO mordeu o seu dedo !";
}

