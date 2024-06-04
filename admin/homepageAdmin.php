<?php
require("../verificar_login.php");
if(isset($_SESSION['userName'])) {
    $username = $_SESSION['userName'];
} else {
    $username = "";
}  
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.8/b-3.0.2/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.8/b-3.0.2/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css"/>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.8/b-3.0.2/sl-2.0.3/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.8/b-3.0.2/sl-2.0.3/datatables.min.js"></script>
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
  <div class="row row-cols-2">
    <div class="col">
    <h2 >Filmes</h2>
    <table id="filmes" class="table table-responsive compact cell-border hover nowrap stripe" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Capa</th>
                <th>Título</th>
                <th>Nota</th>
                <th>Data de Lançamento</th>
                <th>Gênero(s)</th>
                <th>URL</th>
                <th> Sinopse </th>
            </tr>
        </thead>
    </table>
    </div>
    <div class="col">
    <h2>Usuários</h2>
    <table id="usuarios" class="table table-responsive compact cell-border hover nowrap stripe" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Capa do Usuário</th>
                <th>Sexo</th>
                <th>E-Mail</th>
            </tr>
        </thead>
    </table>
    </div>
    <div class="col">
        <h2>Atores</h2>
        <table id="ator" class="table table-responsive compact cell-border hover nowrap stripe" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="col">
        <h2>Diretores</h2>
        <table id="diretor" class="table table-responsive compact cell-border hover nowrap stripe" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
            </thead>
        </table>        
    </div>
  </div>
</div>
    <script>
    new DataTable('#filmes', {
        processing: true,
        serverSide: true,
        select: true,
        ajax: 'filmes.php',
        scrollX: true,
    });

    new DataTable('#usuarios', {
        processing: true,
        serverSide: true,
        select: true,
        ajax: 'usuarios.php',
        scrollX: true,
        layout: {
        topStart: {
            buttons: [ 'copy', 'csv', 'excel' ]
        }
    }
    });

    new DataTable('#ator', {
        processing: true,
        serverSide: true,
        select: true,
        ajax: 'atores.php',
        scrollX: true,
    });

    new DataTable('#diretor', {
        processing: true,
        serverSide: true,
        select: true,
        ajax: 'diretores.php',
        scrollX: true,
    });

    </script>
</body>
</html>