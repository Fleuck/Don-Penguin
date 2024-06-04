<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$database = "projetoDonPenguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

$dados_requisicao= $_REQUEST;

$query_qnt_usuarios = "SELECT COUNT(id_ator) AS qnt_usuarios FROM ator";
$result_qnt_usuarios = $conn->prepare($query_qnt_usuarios);
$result_qnt_usuarios->execute();
$row_qnt_usuarios = $result_qnt_usuarios->fetch(PDO::FETCH_ASSOC);

$query_total_usuarios= "SELECT id_ator, nome_ator, descricao_ator FROM ator ORDER BY id_ator DESC";
$result_total_usuarios = $conn->prepare($query_total_usuarios);
$result_total_usuarios->execute();

while($row_usuarios = $result_total_usuarios->fetch(PDO::FETCH_ASSOC)){
    extract($row_usuarios);
    $registro = [];
    $registro[] = $id_ator;
    $registro[] = $nome_ator;
    $registro[] = $descricao_ator;
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