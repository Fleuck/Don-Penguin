<?php
require("../verificar_login.php");

if (!isset($_GET['id'])) {
    echo "ID do filme não fornecido!";
    exit;
}

if (isset($_SESSION['userName'])) {
    $sessionUsername = $_SESSION['userName'];
} else {
    $sessionUsername = "";
}

$film_id = $_GET['id'];

$servername = "localhost";
$dbUsername = "root";
$password = "";
$database = "projetoDonPenguin";

$conn = new mysqli($servername, $dbUsername, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM filme WHERE id_filme = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $film_id);
$stmt->execute();
$result = $stmt->get_result();

$filme = $result->fetch_assoc();

if (!$filme) {
    echo "Filme não encontrado!";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Don Penguin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body style="background-color: black;">
    <div class="all" id="all">
        <header>
            <div class="org">
                <img class="logo" src="../midia/penguin.jpg" alt="logo">
                <li style="color: white"><?php echo "Bem-vindo, $sessionUsername!"; ?></li>
                <nav>
                    <ul class="barra">
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

        <div class="tudo">
            <div class="video-background">
                <video autoplay muted loop id="video-background" poster="midias/poster_bladerunner.jpg">
                    <source src="./midias/youtube_Eev16S__0g8_1920x1080_h264.mp4" type="video/mp4">
                </video>
            </div>
            <div class="container text-center mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h1 id="titulo" style="color: white; text-align: left;"><?php echo $filme['nome_filme']; ?></h1>
                        <br>
                        <p id="paragrafo1"><?php echo $filme['sinopse']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo $filme['url_filme']; ?>" target="_blank">
                            <img id="poster" alt="Poster do Filme" src="<?php echo $filme['capa_filme']; ?>" class="img-fluid mt-n8">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <p id="paragrafo2">Direção: Aeranovsky<br>
                            Roteiristas: Darren george
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h5 id="badgesGeneros">
                            <?php
                            $generos = explode(',', $filme['genero_filme']);
                            foreach ($generos as $genero) {
                                echo '<span class="badge text-bg-dark">' . trim($genero) . '</span>';
                            }
                            ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("paragrafo1").classList.add("aparecer");
            document.getElementById("paragrafo2").classList.add("aparecer");
            document.getElementById("badgesGeneros").classList.add("aparecer");
            document.getElementById("poster").classList.add("aparecer");
        });
    </script>

    <script src="script.js"></script>
    <script src="./minibar.js"></script>
</body>
</html>
