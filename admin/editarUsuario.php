<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "projetoDonPenguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if(empty($dados['editid'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente novamente mais tarde!</div>"];
} elseif(empty($dados['editNome'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Preencha o campo nome!</div>"];
}elseif(empty($dados['editDataNascimento'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Preencha o campo data de nascimento!</div>"];
}elseif(empty($dados['editSexo'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Selecione um sexo!</div>"];
}elseif(empty($dados['editEmail'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Selecione um email!</div>"];
}elseif(empty($dados['editAdm'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Defina se é ADM!</div>"];
}else {
    $query_usuario = "UPDATE usuario SET nome_usuario=:nome, nascimento=:nascimento, genero=:genero, email=:email, adm=:adm WHERE id_usuario=:id";
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':id', $dados['editid']);
    $edit_usuario->bindParam(':nome', $dados['editNome']);
    $edit_usuario->bindParam(':nascimento', $dados['editDataNascimento']);
    $edit_usuario->bindParam(':genero', $dados['editSexo']);
    $edit_usuario->bindParam(':email', $dados['editEmail']);
    $edit_usuario->bindParam(':adm', $dados['editAdm']);

    if($edit_usuario->execute()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Houve um erro ao editar!</div>"];
    }

}

echo json_encode($retorna);