<form action="save.php" method="POST" enctype="multipart/form-data">
  <label for="name">Nome:</label><br>
  <input type="text" id="name" name="name"><br> 
  
  <label for="last_name">Sobrenome:</label><br>
  <input type="text" id="last_name" name="last_name"><br><br>

  <label for="email">E-mail:</label><br>
  <input type="email" id="email" name="email" require><br><br>

  <label for="phone">Telefone:</label><br>
  <input type="text" id="phone" name="phone"><br><br>

  <label for="login">Login:</label><br>
  <input type="text" id="login" name="login"><br><br>

  <label for="password">Senha:</label><br>
  <input type="password" id="password" name="password"><br><br>
  
  <input type="submit" value="Submit">
</form>