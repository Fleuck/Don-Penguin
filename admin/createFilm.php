<?php
include('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $capa_filme = $_POST['capa_filme'];
    $nome_filme = $_POST['nome_filme'];
    $nota_filme = $_POST['nota_filme'];
    $lancamento = $_POST['lancamento'];
    $genero_filme = $_POST['genero_filme'];

    $sql = "INSERT INTO filme (capa_filme, nome_filme, nota_filme, lancamento, genero_filme) VALUES ('$capa_filme', '$nome_filme', '$nota_filme', '$lancamento', '$genero_filme')";
    if (mysqli_query($conn, $sql)) {
        echo "Novo filme criado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>