<?php
session_start();
require("../conexao.php");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$user_id = $_SESSION['userID'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

$sql = "UPDATE usuario SET email = '$email', senha = '$senhaCriptografada', nome_usuario = '$nome' WHERE id_usuario = '$user_id'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../TelaLogin/telalogin.html");
} else {
    echo "Error, tente novamente" . $conn->error;
}

$conn->close();

?>