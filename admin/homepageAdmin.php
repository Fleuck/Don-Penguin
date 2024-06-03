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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Don Penguin</title>
</head>

<body>
    <div class="all" id="all">
        <header>
            <div class="org">
                <img class="logo" src="../midia/penguin.jpg" alt="logo">
                <nav>
                    <ul class="barra">
                        <a class="menu" href=""><li><?php echo "Bem-vindo, $username!"; ?></li></a>
                    </ul>
                </nav>
                <div class = "toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>
                
            </div>
        </header> 

        <a href="../layoutTelaFilme/layout.php"><div class="container" id="movie-container"></div></a>
        <div class="searchBar" id="searchBar">
            <form>
                <input type="text" id="nome" name="nome" placeholder="O que vai assisitr ?"><br>
            </form>          
        </div>
        
    </div>
    <table class="table table-dark">
  <thead>
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
    
    $pdo = new PDO('mysql:host=localhost;dbname=projetoDonPenguin', $username, $password);

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
</body>
</html>
