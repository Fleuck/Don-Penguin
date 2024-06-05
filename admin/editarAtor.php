<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$database = "projetoDonPenguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if(empty($dados['editidAtor'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente novamente mais tarde!</div>"];
} elseif(empty($dados['idFilmeEdit'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Preencha o campo ID!</div>"];
}elseif(empty($dados['nomeEditAtor'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Preencha o campo nome!</div>"];
}elseif(empty($dados['descricaoEditAtor'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Preencha o campo descrição!</div>"];
}else {
    $query_usuario = "UPDATE ator SET id_filme=:idFilme, nome_ator=:nome, descricao_ator=:descricao WHERE id_ator=:id";
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':id', $dados['editidAtor']);
    $edit_usuario->bindParam(':idFilme', $dados['idFilmeEdit']);
    $edit_usuario->bindParam(':nome', $dados['nomeEditAtor']);
    $edit_usuario->bindParam(':descricao', $dados['descricaoEditAtor']);

    if($edit_usuario->execute()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Ator editado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Houve um erro ao editar!</div>"];
    }

}

echo json_encode($retorna);