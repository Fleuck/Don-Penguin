<?php
require("../verificar_login.php");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "projetoDon_Penguin";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_filme, capa_filme FROM filme";
$result = $conn->query($sql);

if(isset($_SESSION['userName'])) {
    $username = $_SESSION['userName'];
} else {
    $username = "";
}

$filmes = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $filmes[] = array(
            'id' => $row['id_filme'],
            'capa' => $row['capa_filme']
        );
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>Don Penguin</title>
</head>
<body>
    <div class="all" id="all">
        <header>
            <div class="org">
                <img class="logo" src="../midia/penguin.jpg" alt="logo">
                <li style="color: white"><?php echo "Bem-vindo, $username!"; ?></li>
                <nav>
                    <ul class="barra">
                        <a class="menu" href="../telaMudarInfo/layoutEdit.html"><li>Alterar Dados</li></a>
                        <a class="menu" href=""><li>Animacao</li></a>
                        <a class="menu" href=""><li>Acao</li></a>
                        <a class="menu" href=""><li>Comedia</li></a>
                        <a class="menu" href=""><li>Classicos</li></a>
                        <a class="menu" href=""><li>Romance</li></a>
                        <a class="menu" href=""><li>Terror/Suspense</li></a>
                        <a class="menu" href="../logout.php"><li>Sair</li></a>
                        <div class="big">
                            <i id="save" class="fa-solid fa-bookmark"></i>
                            <i id="x" class="fa-solid fa-xmark"></i>
                            <i id="search" class="fa-solid fa-magnifying-glass"></i> 
                        </div>
                    </ul>
                </nav>
                <div class="toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="dropdown_menu">
                <a class="menuzinho" href="#"><li>Animacao</li></a>
                <a class="menuzinho" href="#"><li>Acao</li></a>
                <a class="menuzinho" href="#"><li>Comedia</li></a>
                <a class="menuzinho" href="#"><li>Classicos</li></a>
                <a class="menuzinho" href="#"><li>Romance</li></a>
                <a class="menuzinho" href="#"><li>Terror/Suspense</li></a>
                <a class="menuzinho" href="#"><li>Lista</li></a>
                <div class="mini">
                    <a href="#"><i id="save_mini" class="fa-solid fa-bookmark"></i></a>
                    <a href="#"><i id="search_mini" class="fa-solid fa-magnifying-glass"></i></a>
                </div>
            </div>
        </header>

        <div class="container" id="movie-container"></div>
        <div class="searchBar" id="searchBar">
            <form>
                <input type="text" id="nome" name="nome" placeholder="O que vai assisitr ?"><br>
            </form>          
        </div>
        
    </div>

    <div class="searchMenu" id="searchMenu">
        <form>
            <input type="text" id="nome" name="nome" placeholder="O que vai assisitr ?"><br>
        </form>       
        <i id="xMini" class="fa-solid fa-xmark"></i>
    </div>

    <script>
        const movies = <?php echo json_encode($filmes); ?>;

        const movieContainer = document.getElementById("movie-container");

        movies.forEach(movie => {
            const movieElement = document.createElement("div");
            movieElement.classList.add("movie");
            movieElement.innerHTML = `
                <a href="../layoutTelaFilme/layout.php?id=${movie.id}">
                    <img src="${movie.capa}" alt="Filme">
                </a>
            `;
            movieContainer.appendChild(movieElement);
        });
    </script>

    <script src="./minibar.js"></script>
    <script src="./search.js"></script>
</body>
</html>
