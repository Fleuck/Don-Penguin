<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "projetoDon_Penguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if(empty($dados['editidDiretor'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente novamente mais tarde!</div>"];
}elseif(empty($dados['nomeEditDiretor'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Preencha o campo nome!</div>"];
}elseif(empty($dados['descricaoEditDiretor'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Preencha o campo descrição!</div>"];
}else {
    $query_usuario = "UPDATE diretor SET nome_diretor=:nome, descricao_diretor=:descricao WHERE id_diretor=:id";
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':id', $dados['editidDiretor']);
    $edit_usuario->bindParam(':nome', $dados['nomeEditDiretor']);
    $edit_usuario->bindParam(':descricao', $dados['descricaoEditDiretor']);

    if($edit_usuario->execute()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Diretor editado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Houve um erro ao editar!</div>"];
    }

}

echo json_encode($retorna);