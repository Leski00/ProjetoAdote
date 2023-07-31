<?php
include('conexao/conexao.php');

$db = new Database();


class Usuario{

    private $conn;
    private $nome_tabela = "dados";

    public function __construct($db){
        $this->conn = $db;
    }

    public function cadastrar($nome_completo, $email, $numero_telefone, $endereco, $senha, $confirmar_senha){
        if($senha === $confirmar_senha){
            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO dados (nome_completo, email, numero_de_telefone, endereco, senha) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1, $nome_completo);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $numero_telefone);
            $stmt->bindValue(4, $endereco);
            $stmt->bindValue(5, $senhaCriptografada);
            $result = $stmt->execute();

            return $result;
        }else{
            return false;
        }
    }

    public function logar($email, $senha){
        $sql = "SELECT * FROM dados WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if($stmt->rowCount() == 1){
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($senha, $usuario['senha'])){
                return true;
            }
        }else{
            return false;
        }
    }

    public function getIdByEmail($email){
        $sql = "SELECT id FROM dados WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if($stmt->rowCount() == 1){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['id'];
        }else{
            return false;
        }
    }

}
?>
