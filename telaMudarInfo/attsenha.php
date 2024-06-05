<?php
session_start();
require("../conexao.php");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$user_id = $_SESSION['userID'];
$senha = $_POST['senha'];

$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

$sql = "UPDATE usuario SET senha = ? WHERE id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $senhaCriptografada, $user_id);

if ($stmt->execute()) {
    header("Location: ../TelaLogin/telalogin.html");
} else {
    echo "Erro ao atualizar a senha, tente novamente: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
