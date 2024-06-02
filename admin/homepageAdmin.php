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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

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

</body>
</html>