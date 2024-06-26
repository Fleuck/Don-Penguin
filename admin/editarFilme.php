<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "projetoDon_Penguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if(empty($dados['editidFilme'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente novamente mais tarde!</div>"];
} elseif(empty($dados['capaEdit'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Preencha o campo capa!</div>"];
}elseif(empty($dados['nomeEdit'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Preencha o campo nome!</div>"];
}elseif(empty($dados['notaEdit'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Selecione uma nota!</div>"];
}elseif(empty($dados['dataEdit'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Selecione uma data!</div>"];
}elseif(empty($dados['generoEdit'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Selecione um genero!</div>"];
}elseif(empty($dados['urlEdit'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Selecione uma URL!</div>"];
}elseif(empty($dados['sinopseEdit'])){

}else {
    $query_usuario = "UPDATE filme SET capa_filme=:capa, nome_filme=:nome, nota_filme=:nota, lancamento=:lancamento, genero_filme=:genero, url_filme=:url, sinopse=:sinopse WHERE id_filme=:id";
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':id', $dados['editidFilme']);
    $edit_usuario->bindParam(':capa', $dados['capaEdit']);
    $edit_usuario->bindParam(':nome', $dados['nomeEdit']);
    $edit_usuario->bindParam(':nota', $dados['notaEdit']);
    $edit_usuario->bindParam(':lancamento', $dados['dataEdit']);
    $edit_usuario->bindParam(':genero', $dados['generoEdit']);
    $edit_usuario->bindParam(':url', $dados['urlEdit']);
    $edit_usuario->bindParam(':sinopse', $dados['sinopseEdit']);

    if($edit_usuario->execute()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Houve um erro ao editar!</div>"];
    }

}

echo json_encode($retorna);