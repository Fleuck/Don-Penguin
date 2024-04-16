<?php

require("../conexao.php");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $genero = $_POST['genero'];

    $sql = "INSERT INTO usuario (nome_usuario, email, senha, genero) VALUES ('$nome', '$email', '$senha', '$genero')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../TelaLogin/telalogin.html");
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }
}

$conn->close();
?>