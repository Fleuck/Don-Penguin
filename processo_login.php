<?php
session_start();
require("conexao.php");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT id_usuario, nome_usuario, senha, adm FROM usuario WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['senha'];
    $adm = $row['adm'];

    if (password_verify($senha, $hashed_password) && $adm == True) {
        $_SESSION['userID'] = $row['id_usuario'];
        $_SESSION['userName'] = $row['nome_usuario'];
        $_SESSION['adm'] = $row['adm'];
        echo "success adm"; }
            else if (password_verify($senha, $hashed_password)) {
                $_SESSION['userID'] = $row['id_usuario'];
                $_SESSION['userName'] = $row['nome_usuario'];
                $_SESSION['adm'] = $row['adm'];
                echo "success"; 
                    } else {
                        echo "error"; 
                    }
} else {
    echo "error"; 
}

$conn->close();
?>
