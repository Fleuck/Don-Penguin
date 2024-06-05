<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "projetoDonPenguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($dados['idFilme'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo ID Filme!</div>"];
} elseif(empty($dados['nome'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Nome!</div>"];
}elseif(empty($dados['descricao'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Descrição!</div>"];
}else{
    $query_usuario= "INSERT INTO ator (id_filme, nome_ator, descricao_ator) VALUES(:idFilme, :nome, :descricao);";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':idFilme', $dados['idFilme']);
    $cad_usuario->bindParam(':nome', $dados['nome']);
    $cad_usuario->bindParam(':descricao', $dados['descricao']);
    $cad_usuario->execute();

    if($cad_usuario->rowCount()){
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-success' role='alert'>Cadastrado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Não foi possível cadastrar!</div>"];
    }
};

echo json_encode($retorna);
