<?php

require 'SelectFild.php';

?>

<form action="" method="POST" enctype="multipart/form-data">
  <label for="name">Nome:</label><br>
  <input type="text" id="name" name="name"><br> 
  
  <label for="last_name">Sobrenome:</label><br>
  <input type="text" id="last_name" name="last_name"><br><br>

  <label for="email">E-mail:</label><br>
  <input type="email" id="email" name="email" require><br><br>

<?php
    $select = new SelectFild();
    $data = [
        '1' => 'Admin',
        '2' => 'Assinante',
        '3' => 'Assistente',
        '4' => 'Vendedor'
    ];
    $select->select($data, 'level', 'Nivel de usuário');
?>
  
  <input type="submit" value="Submit">
</form>