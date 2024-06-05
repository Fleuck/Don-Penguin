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
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2">
    <h2>Filmes</h2>
    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#cadFilmeModal">
    Cadastrar
    </button>
    </div>
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
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2">
    <h2>Usuários</h2>
    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#cadUsuarioModal">
    Cadastrar
    </button>
    </div>
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

<div class="modal fade" id="cadUsuarioModal" tabindex="-1" aria-labelledby="cadUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadUsuarioModalLabel">Cadastrar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertErroCadUsuario"></span>
                    <form method="POST" id="form-cad-usuario" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dataNascimento" class="col-sm-2 col-form-label">Aniversário</label>
                            <div class="col-sm-10">
                                <input type="date" name="dataNascimento" class="form-control" id="dataNascimento" placeholder="Salário">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="capaUser" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" name="capaUser" class="form-control" id="capaUser" placeholder="Idade">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="sexo" id="sexo">
                                <option selected></option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outro">Outro</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Idade">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-success btn-sm" value="Cadastrar">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cadFilmeModal" tabindex="-1" aria-labelledby="cadFilmeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadFilmeModalLabel">Cadastrar Filme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertErroCadFilme"></span>
                    <form method="POST" id="form-cad-filme" enctype="multipart/form-data">

                        <div class="row mb-3">
                            <label for="capa" class="col-sm-2 col-form-label">Capa</label>
                            <div class="col-sm-10">
                                <input type="text" name="capa" class="form-control" id="capa" placeholder="URL da capa">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do filme">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nota" class="col-sm-2 col-form-label">Nota</label>
                            <div class="col-sm-10">
                                <input type="number" name="nota" class="form-control" id="nota" placeholder="Nota do filme">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="data" class="col-sm-2 col-form-label">Lançamento</label>
                            <div class="col-sm-10">
                                <input type="date" name="data" class="form-control" id="data" placeholder="Data de Lançamento">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="genero" class="col-sm-2 col-form-label">Gênero</label>
                            <div class="col-sm-10">
                                <input type="text" name="genero" class="form-control" id="genero" placeholder="Genero do filme">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="url" class="col-sm-2 col-form-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" name="url" class="form-control" id="url" placeholder="URL do Filme">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sinopse" class="col-sm-2 col-form-label">Sinopse</label>
                            <div class="col-sm-10">
                                <input type="text" name="sinopse" class="form-control" id="sinopse" placeholder="Sinopse do filme">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-success btn-sm" value="Cadastrar">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="customTabelas.js"> </script>
</body>
</html>