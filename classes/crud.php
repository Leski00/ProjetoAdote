 <?php
//  session_start();
include('conexao/conexao.php');

$db = new Database();

class Crud{

    private $conn;
    private $nome_tabela = "crud";

    public function __construct($db){
        $this->conn = $db;
    }

    public function create($postValues)
    {
    $nome_completo = $postValues['nome'];
    $nome_pet = $postValues['nome_pet'];
    $celular = $postValues['celular'];
    $email = $postValues['email'];
    $especie = $postValues['especie'];
    $descricao = $postValues['descricao'];
    $id_usuario = $_SESSION['id'];
   
 
    $query = "INSERT INTO " . $this->nome_tabela . "(nome, nome_pet, celular, email, especie, descricao, id_usuario,imagem_pet) VALUES(?,?,?,?,?,?,?,?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $nome_completo);
    $stmt->bindParam(2, $nome_pet);
    $stmt->bindParam(3, $celular);
    $stmt->bindParam(4, $email);
    $stmt->bindParam(5, $especie);
    $stmt->bindParam(6, $descricao);
    $stmt->bindParam(7, $id_usuario);
   

    if (isset($_FILES['imagem'])) {
        $arquivo = $_FILES['imagem'];
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $ex_permitidos = array('jpg', 'jpeg', 'png', 'gif');

        if (!in_array(strtolower($extensao), $ex_permitidos)) {
            die('Tipo de arquivo não é permitido');
        } else {
            $nome_arquivo = $arquivo['name']; // Nome do arquivo original
            move_uploaded_file($arquivo['tmp_name'], 'imgs-pets/' . $nome_arquivo);
            // Aqui você pode salvar o nome do arquivo no banco de dados se necessário
            $stmt->bindParam(8, $nome_arquivo);
        }
    }

    if ($stmt->execute()) {
        echo "<script> alert('Cadastro realizado com sucesso!')</script>";
        echo "<script> location.href='?action=read';</script>";
        return true;
    } else {
        echo "Erro ao criar registro.";
        return false;
    }
}


    public function read(){
        $id_usuario = $_SESSION['id'];
        $query = "SELECT * FROM " . $this->nome_tabela . " WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id_usuario);
        $stmt->execute();
        return $stmt;
    }

    public function update($postValues){
        $id = $postValues['id'];
        $nome_completo = $postValues['nome'];
        $nome_pet = $postValues['nome_pet'];
        $celular = $postValues['celular'];
        $email = $postValues['email'];
        $especie = $postValues['especie'];
        $descricao = $postValues['descricao'];

        if(empty($id) || empty($nome_completo) || empty($nome_pet) || empty($celular) || empty($email) || empty($especie) || empty($descricao)){
            return false;
        }
        $query = "UPDATE " . $this->nome_tabela." SET nome = ?, nome_pet = ?, celular = ?, email = ?, especie = ?, descricao = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$nome_completo);
        $stmt->bindParam(2,$nome_pet);
        $stmt->bindParam(3,$celular);
        $stmt->bindParam(4,$email);
        $stmt->bindParam(5,$especie);
        $stmt->bindParam(6,$descricao);
        $stmt->bindParam(7,$id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function readOne($id){
        $query = "SELECT * FROM ".$this->nome_tabela . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        $query = "DELETE FROM " . $this->nome_tabela . " WHERE ID =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function readAll(){
        $query = "SELECT * FROM " . $this->nome_tabela;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}

?> 