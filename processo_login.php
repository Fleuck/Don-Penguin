<?php
session_start();
require("conexao.php");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$email = $_GET['email'];
$senha = $_GET['senha'];

$sql = "SELECT id_usuario, nome_usuario, senha FROM usuario WHERE email = '$email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['senha'];

    if(password_verify($senha, $hashed_password)) {
        $_SESSION['userID'] = $row['id_usuario'];
        $_SESSION['userName'] = $row['nome_usuario'];
        header("Location: filmesHub/homepage.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Email ou senha incorretos.";
        header("Location: login.html");
        exit();
    }
} else {
    $_SESSION['login_error'] = "Email ou senha incorretos.";
    header("Location: login.html");
    exit();
}

$conn->close();
?>