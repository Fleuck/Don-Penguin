<?php

// Incluir a conexao com o banco de dados
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$database = "projetoDonPenguin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $database, $username, $password);
} catch(PDOException $err) {}

//Receber os dados da requisão
$dados_requisicao = $_REQUEST;

// Lista de colunas da tabela
$colunas = [
    0 => 'id_filme',
    1 => 'capa_filme',
    2 => 'nome_filme',
    3 => 'nota_filme',
    4 => 'lancamento',
    5 => 'genero_filme',
    6 => 'url_filme',
    7 => 'sinopse'
];

// Obter a quantidade de registros no banco de dados
$query_qnt_usuarios = "SELECT COUNT(id_filme) AS qnt_filme FROM filme";

// Acessa o IF quando ha paramentros de pesquisa   
if(!empty($dados_requisicao['search']['value'])) {
    $query_qnt_usuarios .= " WHERE id_filme LIKE :id ";
    $query_qnt_usuarios .= " OR capa_filme LIKE :capa ";
    $query_qnt_usuarios .= " OR nome_filme LIKE :nome ";
    $query_qnt_usuarios .= " OR nota_filme LIKE :nota ";
    $query_qnt_usuarios .= " OR lancamento LIKE :lancamento ";
    $query_qnt_usuarios .= " OR genero_filme LIKE :genero ";
    $query_qnt_usuarios .= " OR url_filme LIKE :url ";
    $query_qnt_usuarios .= " OR sinopse LIKE :sinopse ";
}
// Preparar a QUERY
$result_qnt_usuarios = $conn->prepare($query_qnt_usuarios);
// Acessa o IF quando ha paramentros de pesquisa   
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_usuarios->bindParam(':id', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':capa', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':nota', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':lancamento', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':url', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':sinopse', $valor_pesq, PDO::PARAM_STR);
}
// Executar a QUERY responsável em retornar a quantidade de registros no banco de dados
$result_qnt_usuarios->execute();
$row_qnt_usuarios = $result_qnt_usuarios->fetch(PDO::FETCH_ASSOC);
//var_dump($row_qnt_usuarios);

// Recuperar os registros do banco de dados
$query_usuarios = "SELECT id_filme, capa_filme, nome_filme, nota_filme, lancamento, genero_filme, url_filme, sinopse
                    FROM filme ";

// Acessa o IF quando ha paramentros de pesquisa   
if(!empty($dados_requisicao['search']['value'])) {
    $query_usuarios .= " WHERE id_filme LIKE :id ";
    $query_usuarios .= " OR capa_filme LIKE :capa ";
    $query_usuarios .= " OR nome_filme LIKE :nome ";
    $query_usuarios .= " OR nota_filme LIKE :nota ";
    $query_usuarios .= " OR lancamento LIKE :lancamento ";
    $query_usuarios .= " OR genero_filme LIKE :genero ";
    $query_usuarios .= " OR url_filme LIKE :url ";
    $query_usuarios .= " OR sinopse LIKE :sinopse ";
}

// Ordenar os registros
$query_usuarios .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";

// Preparar a QUERY
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
$result_usuarios->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);

// Acessa o IF quando ha paramentros de pesquisa   
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_usuarios->bindParam(':id', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':capa', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':nota', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':lancamento', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':url', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':sinopse', $valor_pesq, PDO::PARAM_STR);
}
// Executar a QUERY
$result_usuarios->execute();

// Ler os registros retornado do banco de dados e atribuir no array 
while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    extract($row_usuario);
    $registro = [];
    $registro[] = $id_filme; 
    $registro[] = $capa_filme;
    $registro[] = $nome_filme;
    $registro[] = $nota_filme;
    $registro[] = $lancamento;
    $registro[] = $genero_filme;
    $registro[] = $url_filme;
    $registro[] = $sinopse;
    $registro[] = "<button type='button' id='$id_filme' class='btn btn-primary btn-sm' onclick='visFilme($id_filme)'> Vizualizar </button> 
    <button type='button' id='$id_filme' class='btn btn-warning btn-sm' onclick='editFilme($id_filme)'> Editar </button> 
    <button type='button' id='$id_filme' class='btn btn-danger btn-sm' onclick='apagarFilme($id_filme)'> Apagar </button>";
    $dados[] = $registro;
}

//Cria o array de informações a serem retornadas para o Javascript
$resultado = [
    "draw" => intval($dados_requisicao['draw']), // Para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($row_qnt_usuarios['qnt_filme']), // Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($row_qnt_usuarios['qnt_filme']), // Total de registros quando houver pesquisa
    "data" => $dados // Array de dados com os registros retornados da tabela usuarios
];

// Retornar os dados em formato de objeto para o JavaScript
echo json_encode($resultado);
