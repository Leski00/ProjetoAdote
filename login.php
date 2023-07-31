<?php
session_start();

require_once('classes/usuario.php');
require_once('conexao/conexao.php');

$database = new Database();
$db= $database->getConnection();
$usuario = new Usuario($db);

if(isset($_POST['logar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario->logar($email, $senha)) {
      // Obtém o ID do usuário após o login bem-sucedido
      $id = $usuario->getIdByEmail($email);
  
      // Armazena o ID e o email na sessão
      $_SESSION['email'] = $email;
      $_SESSION['id'] = $id;
  
      header("Location: dashboard.php");
      exit();
  } else {
      print "<script>alert('Login Inválido')</script>";
  }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/login.css">
  <title>Tela de Login</title>

</head>

<body>
  <div class="container">
    <h2>Tela de Login</h2>
    <form method="POST">
      <input type="email" name='email' placeholder="Email" required>
      <input type="password" name='senha' placeholder="Senha" required>
      <input type="submit" name='logar' value="Logar"> 
      <a href="cadastro.php" class="button">Cadastrar</a>
      
    </form>
   
  </div>
</body>

</html>
