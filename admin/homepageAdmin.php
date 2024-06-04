<?php
require("../verificar_login.php");
if(isset($_SESSION['userName'])) {
    $username = $_SESSION['userName'];
} else {
    $username = "";
}  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
    .texto-branco {
        color: white;
    }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Don Penguin</title>
</head>
<body style="background-color: #1c1c1c">
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">
        <img src="../midia/penguin.jpg" alt="Bootstrap" width="30" height="24"><?php echo "Bem-vindo, $username!"; ?>
        </a>
    </div>
    </nav>
    <div class="container text-center">
  <div class="row texto-branco">
    <div class="col">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
        <thead style="padding-">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do Usuário</th>
            <th scope="col">E-mail</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "projetoDonPenguin";

        $pdo = new PDO('mysql:host=127.0.0.1:3307;dbname=projetoDonPenguin', $username, $password);

        try {
            $consulta = $pdo->query("SELECT nome_usuario, email FROM usuario;");

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<th scope='row'> </th>";
            echo "<td>{$linha['nome_usuario']}</td>";
            echo "<td>{$linha['email']}</td>";
            echo "</tr>";
            }
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
        ?>
        </tbody>
        </table>
        </div>
    </div></div>
    <div class="row texto-branco">
    <div class="col">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead style="padding-">
            <tr>
                <th scope="col">#</th>
                <th scope="col">URL Filme</th>
                <th scope="col">capa filme</th>
                <th scope="col">nome filme</th>
                <th scope="col">nota filme</th>
                <th scope="col">lançamento</th>
                <th scope="col">genero</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "projetoDonPenguin";

            $pdo = new PDO('mysql:host=127.0.0.1:3307;dbname=projetoDonPenguin', $username, $password);

            try {
                $consulta = $pdo->query("SELECT url_filme, sinopse, capa_filme, nome_filme, nota_filme, lancamento, genero_filme FROM filme;");

                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<th scope='row'> </th>";
                echo "<td>{$linha['url_filme']}</td>";
                echo "<td>{$linha['capa_filme']}</td>";
                echo "<td>{$linha['nome_filme']}</td>";
                echo "<td>{$linha['nota_filme']}</td>";
                echo "<td>{$linha['lancamento']}</td>";
                echo "<td>{$linha['genero_filme']}</td>";
                echo "</tr>";
                }
            } catch (PDOException $e) {
                echo 'Erro: ' . $e->getMessage();
            }
            ?>
        </tbody>
        </table>
        </div>
    </div>
    </div>
    <div class="row texto-branco">
        <div class="col">
        <div class="table-responsive">
        <table class="table table-dark table-sm">
        <thead style="padding-">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do Usuário</th>
            <th scope="col">E-mail</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "projetoDonPenguin";

        $pdo = new PDO('mysql:host=127.0.0.1:3307;dbname=projetoDonPenguin', $username, $password);

        try {
            $consulta = $pdo->query("SELECT nome_ator, descricao_ator FROM ator;");

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<th scope='row'> </th>";
            echo "<td>{$linha['nome_ator']}</td>";
            echo "<td>{$linha['descricao_ator']}</td>";
            echo "</tr>";
            }
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
        ?>
        </tbody>
        </table>
        </div>
        </div>
    </div>
  </div>
</div>
</body>
</html>