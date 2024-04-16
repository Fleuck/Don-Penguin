<?php

require("../conexao.php");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$genero = $_POST['genero'];

$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (nome_usuario, email, senha, genero) VALUES ('$nome', '$email', '$senhaCriptografada', '$genero')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../TelaLogin/telalogin.html");
} else {
    echo "Error, tente novamente" . $conn->error;
}

$conn->close();

?>
