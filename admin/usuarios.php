<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$database = "projetoDonPenguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

$dados_requisicao= $_REQUEST;

$query_qnt_usuarios = "SELECT COUNT(id_usuario) AS qnt_usuarios FROM usuario";
$result_qnt_usuarios = $conn->prepare($query_qnt_usuarios);
$result_qnt_usuarios->execute();
$row_qnt_usuarios = $result_qnt_usuarios->fetch(PDO::FETCH_ASSOC);

$query_total_usuarios= "SELECT id_usuario, nome_usuario, nascimento, capa_user, genero, email FROM usuario ORDER BY id_usuario DESC";
$result_total_usuarios = $conn->prepare($query_total_usuarios);
$result_total_usuarios->execute();

while($row_usuarios = $result_total_usuarios->fetch(PDO::FETCH_ASSOC)){
    extract($row_usuarios);
    $registro = [];
    $registro[] = $id_usuario;
    $registro[] = $nome_usuario;
    $registro[] = $nascimento;
    $registro[] = $capa_user;
    $registro[] = $genero;
    $registro[] = $email;
    $dados[] = $registro;
};

$resultado = [
    "draw" => intval($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_usuarios['qnt_usuarios']),
    "recordsFiltered" => intval($row_qnt_usuarios['qnt_usuarios']),
    "data" => $dados 
];

echo json_encode($resultado);
?>