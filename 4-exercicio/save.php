<?php
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!$post) {
   header("Location: ./");
}

if(in_array('', $post)) {
    echo "<p>Preencha todos os campos do formulário.</p> <br>";
    echo "<a href='./'>Voltar</a>";
    die;
}

if(!validate($post)) {
    echo "<a href='./'>Voltar</a>";
    die;
}

function validate($data)
{
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        echo("{$data['email']} não é um e-mail válido");
        return false;
    }

    if (!filter_var($data['phone'], FILTER_VALIDATE_INT)) {
        echo("{$data['phone']} não é um numero válido");
        return false;
    }

    $file = fopen ('registros.txt', 'r');
    while(!feof($file)) {

        $line = fgets($file, 1024);
        if(strpos($line, $data['email'])) {
            echo("{$data['email']} já está cadastrado.");
            return false;
        }

    }

    fclose($file);

    return true;
}

$post['password'] = password_hash($post['password'], PASSWORD_DEFAULT); 

$file = fopen("registros.txt", 'a');
$save = fwrite($file, print_r($post, TRUE));

if(!$save) {
    echo("Não foi possivel salvar os registros.");
    echo "<a href='./'>Voltar</a>";
} else { 
    echo("Registro salvo com sucesso.");
    echo "<a href='./'>Cadastrar Novo</a>";
}

fclose($file);