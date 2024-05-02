<?php
require("conexao.php");

$email = $_GET['email'];

$sql = "SELECT email FROM usuario WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Se entrar aqui, quer dizer q o email é novo
    echo "existe";
} else {
    // Só entrará aq se o email for repetido
}

$conn->close();
?>
