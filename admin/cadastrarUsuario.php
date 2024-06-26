<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "projetoDon_Penguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($dados['nome'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Nome Usuario!</div>"];
} elseif(empty($dados['dataNascimento'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Aniversário!</div>"];
}elseif(empty($dados['sexo'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário selecionar um sexo!</div>"];
}elseif(empty($dados['email'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o e-mail!</div>"];
}else{
    $query_usuario= "INSERT INTO usuario (nome_usuario, nascimento, capa_user, genero, email) VALUES(:nome, :dataNascimento, :capaUser, :sexo, :email);";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':nome', $dados['nome']);
    $cad_usuario->bindParam(':dataNascimento', $dados['dataNascimento']);
    $cad_usuario->bindParam(':capaUser', $dados['capaUser']);
    $cad_usuario->bindParam(':sexo', $dados['sexo']);
    $cad_usuario->bindParam(':email', $dados['email']);
    $cad_usuario->execute();

    if($cad_usuario->rowCount()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Cadastrado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Não foi possível cadastrar!</div>"];
    }
};

echo json_encode($retorna);
