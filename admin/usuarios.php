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
    0 => 'id_usuario',
    1 => 'nome_usuario',
    2 => 'nascimento',
    3 => 'capa_user',
    4 => 'genero',
    5 => 'email'
];

// Obter a quantidade de registros no banco de dados
$query_qnt_usuarios = "SELECT COUNT(id_usuario) AS qnt_usuarios FROM usuario";

// Acessa o IF quando ha paramentros de pesquisa   
if(!empty($dados_requisicao['search']['value'])) {
    $query_qnt_usuarios .= " WHERE id_usuario LIKE :id ";
    $query_qnt_usuarios .= " OR nome_usuario LIKE :nome ";
    $query_qnt_usuarios .= " OR nascimento LIKE :nascimento ";
    $query_qnt_usuarios .= " OR genero LIKE :genero ";
    $query_qnt_usuarios .= " OR email LIKE :email ";
}
// Preparar a QUERY
$result_qnt_usuarios = $conn->prepare($query_qnt_usuarios);
// Acessa o IF quando ha paramentros de pesquisa   
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_usuarios->bindParam(':id', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':nascimento', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':email', $valor_pesq, PDO::PARAM_STR);
}
// Executar a QUERY responsável em retornar a quantidade de registros no banco de dados
$result_qnt_usuarios->execute();
$row_qnt_usuarios = $result_qnt_usuarios->fetch(PDO::FETCH_ASSOC);
//var_dump($row_qnt_usuarios);

// Recuperar os registros do banco de dados
$query_usuarios = "SELECT id_usuario, nome_usuario, nascimento, capa_user, genero, email
                    FROM usuario ";

// Acessa o IF quando ha paramentros de pesquisa   
if(!empty($dados_requisicao['search']['value'])) {
    $query_usuarios .= " WHERE id_usuario LIKE :id ";
    $query_usuarios .= " OR nome_usuario LIKE :nome ";
    $query_usuarios .= " OR nascimento LIKE :nascimento ";
    $query_usuarios .= " OR genero LIKE :genero ";
    $query_usuarios .= " OR email LIKE :email ";
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
    $result_usuarios->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':nascimento', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':genero', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':email', $valor_pesq, PDO::PARAM_STR);
}
// Executar a QUERY
$result_usuarios->execute();

// Ler os registros retornado do banco de dados e atribuir no array 
while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    extract($row_usuario);
    $registro = [];
    $registro[] = $id_usuario;
    $registro[] = $nome_usuario;
    $registro[] = $nascimento;
    $registro[] = $capa_user;
    $registro[] = $genero;
    $registro[] = $email;
    $registro[] = "<button type='button' id='$id_usuario' class='btn btn-primary btn-sm' onclick='visUsuario($id_usuario)'> Vizualizar </button> 
    <button type='button' id='$id_usuario' class='btn btn-warning btn-sm' onclick='editUsuario($id_usuario)'> Editar </button> 
    <button type='button' id='$id_usuario' class='btn btn-danger btn-sm' onclick='apagarUsuario($id_usuario)'> Apagar </button>";
    $dados[] = $registro;
}

//Cria o array de informações a serem retornadas para o Javascript
$resultado = [
    "draw" => intval($dados_requisicao['draw']), // Para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($row_qnt_usuarios['qnt_usuarios']), // Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($row_qnt_usuarios['qnt_usuarios']), // Total de registros quando houver pesquisa
    "data" => $dados // Array de dados com os registros retornados da tabela usuarios
];

// Retornar os dados em formato de objeto para o JavaScript
echo json_encode($resultado);
