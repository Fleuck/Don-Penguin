<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_filme = $_POST["nome_filme"];
    $lancamento = $_POST["lancamento"];
    $diretor = $_POST["diretor"];
    $genero_filme = $_POST["genero_filme"];
    $sinopse = $_POST["sinopse"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projetoDonPenguin";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "INSERT INTO filmes (nome_filme, lancamento, diretor, genero_filme, sinopse) 
    VALUES ('$nome_filme', '$lancamento', '$diretor', '$genero_filme', '$sinopse')";

    if ($conn->query($sql) === TRUE) {
        $mensagem = "Filme cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar o filme: " . $conn->error;
    }

    $conn->close();
}
?>
