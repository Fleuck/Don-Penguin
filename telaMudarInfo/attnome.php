<?php
session_start();
require("../conexao.php");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$user_id = $_SESSION['userID'];
$nome = $_POST['nome'];

$sql = "UPDATE usuario SET nome_usuario = ? WHERE id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $nome, $user_id);

if ($stmt->execute()) {
    header("Location: ../TelaLogin/telalogin.html");
} else {
    echo "Erro ao atualizar o nome, tente novamente: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
