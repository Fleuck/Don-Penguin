<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$database = "projetoDonPenguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

$dados_requisicao= $_REQUEST;

$query_qnt_filmes = "SELECT COUNT(id_filme) AS qnt_filmes FROM filme";
$result_qnt_filmes = $conn->prepare($query_qnt_filmes);
$result_qnt_filmes->execute();
$row_qnt_filmes = $result_qnt_filmes->fetch(PDO::FETCH_ASSOC);

$query_total_filmes= "SELECT * FROM filme ORDER BY id_filme DESC";
$result_total_filmes = $conn->prepare($query_total_filmes);
$result_total_filmes->execute();

while($row_filmes = $result_total_filmes->fetch(PDO::FETCH_ASSOC)){
    extract($row_filmes);
    $registro = [];
    $registro[] = $id_filme;
    $registro[] = $capa_filme;
    $registro[] = $nome_filme;
    $registro[] = $nota_filme;
    $registro[] = $lancamento;
    $registro[] = $genero_filme;
    $registro[] = $url_filme;
    $registro[] = $sinopse;
    $dados[] = $registro;
};

$resultado = [
    "draw" => intval($dados_requisicao['draw']),
    "recordsTotal" => intval($row_qnt_filmes['qnt_filmes']),
    "recordsFiltered" => intval($row_qnt_filmes['qnt_filmes']),
    "data" => $dados 
];

echo json_encode($resultado);
?>