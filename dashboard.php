<?php

session_start();

if(!isset($_SESSION['id'])){
  header("Location:login.php ");
  exit();
}

$email = $_SESSION['email'];
$id = $_SESSION['id'];

require_once('classes/crud.php');
require_once('conexao/conexao.php');

$database = new Database();
$db = $database->getConnection();
$crud = new Crud($db);

if(isset($_GET['action'])){
    switch($_GET['action']){
      case 'create':
        $crud->create($_POST);
        $rows = $crud->read();
        break; 
      case 'update':
        if(isset($_POST['id'])){
          $crud->update($_POST);
        }
        $rows = $crud->read();
        break;
      case 'delete':
          $crud->delete($_GET['id']);
          $rows = $crud->read();
          break;
        
      default:
        $rows = $crud->read();
        break;
    }
}else{
$rows = $crud->read();
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      margin-top: 50px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 20px;
    }

    .header a {
      margin-left: 10px;
      padding: 10px 15px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 3px;
      text-decoration: none;
    }

    .header a:hover {
      background-color: #45a049;
    }

    .create-ad-button {
      margin-left: auto;
    }

    .logout-button {
      position: absolute;
      bottom: 20px;
      right: 20px;
      padding: 10px 15px;
      background-color: #ff4d4d;
      color: #fff;
      border: none;
      border-radius: 3px;
      text-decoration: none;
    }

    .logout-button:hover {
      background-color: #ff3333;
    }

    .form-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      margin-top: 50px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-bottom: 10px;
    }

    textarea {
      resize: vertical;
      height: 100px;
    }

    input[type="submit"] {
      padding: 10px 15px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .container_tabela {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    #tabela_resultado {
      width: 100%;
      border-collapse: collapse;
    }

    #tabela_resultado th,
    #tabela_resultado td {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #tabela_resultado th {
      background-color: #f2f2f2;
    }

    #tabela_resultado tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    @media screen and (max-width: 600px) {
      #tabela_resultado {
        display: block;
        overflow-x: auto;
      }

      #tabela_resultado tr {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 10px;
      }

      #tabela_resultado th,
      #tabela_resultado td {
        width: 100%;
        display: inline-block;
        text-align: left;
      }
    }
  </style>
</head>

<body>
  <?php
  if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $crud->readOne($id);

    if(!$result){
      echo "Registro não encontrado.";
      exit();
    }
    $nome_completo = $result['nome'];
    $nome_pet = $result['nome_pet'];
    $celular = $result['celular'];
    $email = $result['email'];
    $especie = $result['especie'];
    $descricao = $result['descricao'];
  

  ?>
<div class="form-container">
    <h3>Preencha o formulário:</h3>
    <form action="?action=update" method="POST">
      <input type="hidden" name="id" value="<?php echo $id ?>">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" value="<?php echo $nome_completo ?>" required>

      <label for="nome_pet">Nome do Pet:</label>
      <input type="text" id="nome_pet" name="nome_pet" value="<?php echo $nome_pet ?>" required>

      <label for="celular">Celular:</label>
      <input type="text" id="celular" name="celular" value="<?php echo $celular ?>" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $email ?>" required>

      <label for="especie">Espécie:</label>
      <input type="text" id="especie" name="especie" value="<?php echo $especie ?>" required>

      <label for="descricao">Descrição:</label>
      <textarea id="descricao" name="descricao" value="" required><?php echo $descricao ?></textarea>

      <input type="submit" value="Salvar">
    </form>
  </div>
  <?php
    }else{
  ?>

  <div class="container">
    <div class="header">
      <a href="home.php" class="create-ad-button">Home</a>
    </div>
    <h2>Bem-vindo à Homepage</h2>
    <p>Conteúdo da página inicial...</p>
  </div>

  <div class="form-container">
    <h3>Preencha o formulário:</h3>
    <form action="?action=create" method="POST" enctype="multipart/form-data">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required>

      <label for="nome_pet">Nome do Pet:</label>
      <input type="text" id="nome_pet" name="nome_pet" required>

      <label for="celular">Celular:</label>
      <input type="text" id="celular" name="celular" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="especie">Espécie:</label>
      <input type="text" id="especie" name="especie" required>

      <label for="descricao">Descrição:</label>
      <textarea id="descricao" name="descricao" required></textarea>

      <label for="imagem do dog">Imagem do Pet</label>
      <input type="file" name="imagem">

      <input type="submit"  value="Enviar">
    </form>
  </div>
<?php
    }
?>

  <div class="container_tabela">
    <table id="tabela_resultado">
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Nome do pet</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Espécie</th>
        <th>Descrição</th>
        <th>Ações</th>
      </tr>
      <?php
      if (isset($rows)) {
        foreach ($rows as $row) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['nome'] . "</td>";
          echo "<td>" . $row['nome_pet'] . "</td>";
          echo "<td>" . $row['celular'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['especie'] . "</td>";
          echo "<td>" . $row['descricao'] . "</td>";
          echo "<td>";
          echo "<a href='?action=update&id=" . $row['id'] . "'>Editar</a>";
          echo "<a href='?action=delete&id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja deletar esse registro\")' class='delete'>Excluir</a>";
          echo "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='8'>Não há registro no banco de dados!!!</td></tr>";
      }
      ?>
    </table>
  </div>

  <div class="containerLogout">
    <a href="logout.php" class="logout-button">Sair</a>
  </div>

</body>

</html>
