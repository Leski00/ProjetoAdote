<?php
require_once('classes/crud.php');
require_once('conexao/conexao.php');

$database = new Database();
$db = $database->getConnection();
$crud = new Crud($db);
$pets = $crud->readAll();

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- <link rel="stylesheet" href="style/index.css"> -->
  <link rel="stylesheet" href="style/card.css">
<style>
      * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      
    }

    .card{
    width: 300px;
    height: 530px;
    background-color:#f8b500;
    border-radius: 10px;
   
 }
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
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

    footer{
      background-color: #f8b500;
      padding: 50px 0;
     }
    
    .container-footer{
      max-width: 1400px;
      padding: 0 4%;
      margin: auto;
    }
    
    .row-footer{
      display: flex;
      flex-wrap: nowrap;
    }
    
    .footer-col{
      width: 25%;
      padding: 0 15px;
    }
     
    .footer-col h4{
      font-size: 22px;
      color: white;
      margin-bottom: 20px;
      font-weight: 500;
      position: relative;
      text-transform: uppercase;
    
    }	
    .footer-col ul{
      list-style: none;
    }
    
    .footer-col ul li{
      margin: 10px;
    }
    
    .footer-col ul li a{
      font-size: 16px ;
      text-transform: capitalize;
      color: white;
      text-decoration: none;
      font-weight: 300;
      display: block;
      transition: all 0.3s ease;
    
    }
    
    .footer-col ul li a:hover{
        color: #ceccdc;
        padding: 10px;
        
    }
    
    .footer-col .medias-sociais{
      margin-top: 30px;
    }
    
    .footer-col .medias-sociais a {
      display: inline flex;
      align-items: center;
      justify-content: center;
      height: 40px;
      width: 40px;
      margin: 0 10px 10px 0;
      text-decoration: none;
      border-radius: 50%;
      padding: 15px;
      color: white;
      border: 1px solid white;
      transition: all 0.5s ease;
    }
    
    .footer-col .medias-sociais a i{
      font-size: 20px;
    }
    
    .footer-col .medias-sociais a:hover{
      color: #415aca;
      background-color: white;
    }
    
    

</style>

</head>

<body>
<div class="container">
    <div class="header">
      <a href="cadastro.html">Cadastrar</a>
      <a href="login.html">Login</a>
    </div>
    <h1>ADOTE UM AMIGUINHO 4 PATAS</h1>
 
  </div>

  <div class="container-wrapper">
    <?php foreach ($pets as $pet) 
    { ?>
        <div class="container1">
            <div class="card">
                <div class="imagem">
                    <img class="Gold" src="imgs-pets/<?php echo $pet['imagem_pet']; ?>" alt="<?php echo $pet['imagem_pet']; ?>">
                </div>
                <br><br>
                <div class="texto">
                  <br>
                    <h2 class="text-main"><?php echo $pet['nome_pet']; ?></h2>
                    <h2 class="text-main"><?php echo $pet['nome']; ?></h2>
                    <h2 class="text-main"><?php echo $pet['celular']; ?></h2>
                    <h2 class="text-main"><?php echo $pet['email']; ?></h2>
                    <h2 class="text-main"><?php echo $pet['descricao']; ?></h2>
                    <p class="desc"><?php echo $pet['especie']; ?></p>
                </div>
            </div>
        </div>
    <?php 
  }
?>
 
</div>

<footer>
      <div class="container-footer">
        <div class="row-footer">
          <!-- footer col -->
          <div class="footer-col">
            <h4>Empresa</h4>
            <ul>
                <li><a href="">QUEM SOMOS</a></li>
                <li><a href="">NOSSOS SERVIÇOS</a></li>
                <li><a href=""></a>POLÍTICA DE PRIVACIDADE </li>
            </ul>
            </div>
                <!-- end footer col -->
                <!-- footer col -->
          <div class="footer-col">
            <h4>COLABORE</h4>
            <ul>
                <li><a href="">QUERO AJUDAR</a></li>
                <li><a href="">SER PARCEIRO</a></li>
                <li><a href="">PROGRAMA DE AFILIADOS</a></li>
            </ul>
            </div>
                <!-- end footer col -->
                <!-- footer col -->
          <div class="footer-col">
            <h4>Loja online</h4>
            <ul>
                <li><a href="">COMPRE AQUI</a></li>
                <li><a href="">NOSSOS SERVIÇOS</a></li>
                <li><a href="">POLÍTICA DE COMPRAS </a></li>
            </ul>
            </div>
                <!-- end footer col -->
                <!-- footer col -->
          <div class="footer-col">
            <h4>SIGA NOS</h4>
                <!-- form sub -->
            
              <!-- end form sub -->
              <div class="medias-sociais">
              <a href=""> <i class="fa fa-facebook"></i></a>
              <a href=""> <i class="fa fa-instagram"></i></a>
              <a href=""> <i class="fa fa-twitter"></i></a>
              <a href=""> <i class="fa fa-linkedin"></i></a>
              </div>
            </div>
                <!-- end footer col -->
        </div>
      </div>
  </footer>
</body>

</html>
