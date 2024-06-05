<?php
session_start();
require("../conexao.php");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$user_id = $_SESSION['userID'];
$email = $_POST['email'];

$sql = "UPDATE usuario SET email = ? WHERE id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $email, $user_id);

if ($stmt->execute()) {
    header("Location: ../TelaLogin/telalogin.html");
} else {
    echo "Erro ao atualizar o email, tente novamente: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
