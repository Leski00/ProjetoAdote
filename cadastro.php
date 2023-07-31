<?php
require_once('classes/usuario.php');
require_once('conexao/conexao.php');

$database = new dataBase();
$db = $database->getConnection();
$usuario = new Usuario($db);

if(isset($_POST['cadastrar'])){
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $numero_telefone = $_POST['numero_telefone'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if($usuario->cadastrar($nome_completo,$email,$numero_telefone,$endereco,$senha,$confirmar_senha)){
      
      echo "Cadastro realizado com sucesso!";
    }else{
      echo "Erro ao cadastrar!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/cadastro.css">
  <title>Tela de Cadastro</title>
 
</head>

<body>
  <div class="container">
    <h2>Tela de Cadastro</h2>
    <form action="" method="POST">
      <input type="text" name="nome_completo" placeholder="Nome completo" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="tel" name="numero_telefone" placeholder="Número de telefone" required>
      <input type="text" name="endereco" placeholder="Endereço" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <input type="password" name="confirmar_senha" placeholder="Confirmar senha" required>
      <input type="submit" value="Cadastrar" name="cadastrar">
    </form>
  </div>
</body>

</html>
