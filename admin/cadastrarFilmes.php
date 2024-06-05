<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$database = "projetoDonPenguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($dados['capa'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Capa!</div>"];
} elseif(empty($dados['nome'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Nome!</div>"];
}elseif(empty($dados['nota'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher a nota!</div>"];
}elseif(empty($dados['data'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher a data!</div>"];
}elseif(empty($dados['genero'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o genero!</div>"];
}elseif(empty($dados['url'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher a url do filme!</div>"];
}elseif(empty($dados['sinopse'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher a sinopse!</div>"];
}else{
    $query_usuario= "INSERT INTO filme (capa_filme, nome_filme, nota_filme, lancamento, genero_filme, url_filme, sinopse) VALUES (:capa, :nome, :nota, :data, :genero, :url, :sinopse);";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':capa', $dados['capa']);
    $cad_usuario->bindParam(':nome', $dados['nome']);
    $cad_usuario->bindParam(':nota', $dados['nota']);
    $cad_usuario->bindParam(':data', $dados['data']);
    $cad_usuario->bindParam(':genero', $dados['genero']);
    $cad_usuario->bindParam(':url', $dados['url']);
    $cad_usuario->bindParam(':sinopse', $dados['sinopse']);
    $cad_usuario->execute();

    if($cad_usuario->rowCount()){
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-success' role='alert'>Erro: Cadastrado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Cadastrado não realizado!</div>"];
    }
};

echo json_encode($retorna);
?>