<?php

// Incluir a conexao com o banco de dados
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$database = "projetoDonPenguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
    $query_usuario = "DELETE FROM filme WHERE id_filme=:id";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(":id", $id, PDO::PARAM_INT);

    if($result_usuario->execute()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário apagado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não apagado com sucesso!</div>"];
    }
}else{
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não apagado com sucesso!</div>"];
}

echo json_encode($retorna);