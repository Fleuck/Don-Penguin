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
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#cadFilmeModal">
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
                <th>Sinopse</th>
                <th>Ações</th>
            </tr>
        </thead>
    </table>
    </div>
    <div class="col">
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2">
    <h2>Usuários</h2>
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#cadUsuarioModal">
    Cadastrar
    </button>
    <span id="msgAlerta"></span>
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
                <th>Ações</th>
            </tr>
        </thead>
    </table>
    </div>
    <div class="col">
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2">
    <h2>Atores</h2>
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#cadAtorModal">
    Cadastrar
    </button>
    </div>
        <table id="ator" class="table table-responsive compact cell-border hover nowrap stripe" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="col">
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2">
    <h2>Diretores</h2>
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#cadDiretorModal">
    Cadastrar
    </button>
    </div>
        <table id="diretor" class="table table-responsive compact cell-border hover nowrap stripe" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
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

    <div class="modal fade" id="visUsuarioModal" tabindex="-1" aria-labelledby="visUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visUsuarioModalLabel">Detalhes do Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <dl class="row">
                     <dt class="col-sm-3">ID</dt>
                     <dd class="col-sm-9"><span id="idUsuario"></span></dd>

                     <dt class="col-sm-3">Nome</dt>
                     <dd class="col-sm-9"><span id="nomeUsuario"></span></dd>

                     <dt class="col-sm-3">Aniversário</dt>
                     <dd class="col-sm-9"><span id="aniversarioUsuario"></span></dd>

                     <dt class="col-sm-3">Sexo</dt>
                     <dd class="col-sm-9"><span id="sexoUsuario"></span></dd>

                     <dt class="col-sm-3">E-Mail</dt>
                     <dd class="col-sm-9"><span id="emailUsuario"></span></dd>

                     <dt class="col-sm-3">ADM</dt>
                     <dd class="col-sm-9"><span id="admUsuario"></span></dd>
                   </dl>
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

    <div class="modal fade" id="visFilmeModal" tabindex="-1" aria-labelledby="visFilmeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visFilmeModalLabel">Detalhes do Filme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <dl class="row">
                     <dt class="col-sm-3">ID</dt>
                     <dd class="col-sm-9"><span id="idFilmeVis"></span></dd>

                     <dt class="col-sm-3">Capa</dt>
                     <dd class="col-sm-9"><span id="capaFilmeVis"></span></dd>

                     <dt class="col-sm-3">Nome</dt>
                     <dd class="col-sm-9"><span id="nomeFilmeVis"></span></dd>

                     <dt class="col-sm-3">Nota</dt>
                     <dd class="col-sm-9"><span id="notaFilmeVis"></span></dd>

                     <dt class="col-sm-3">Lançamento</dt>
                     <dd class="col-sm-9"><span id="dataFilmeVis"></span></dd>

                     <dt class="col-sm-3">Gênero</dt>
                     <dd class="col-sm-9"><span id="generoFilmeVis"></span></dd>

                     <dt class="col-sm-3">URL</dt>
                     <dd class="col-sm-9"><span id="urlFilmeVis"></span></dd>

                     <dt class="col-sm-3">Sinopse</dt>
                     <dd class="col-sm-9"><span id="sinopseFilmeVis"></span></dd>
                   </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cadAtorModal" tabindex="-1" aria-labelledby="cadAtorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadAtorModalLabel">Cadastrar Ator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertErroCadAtor"></span>
                    <form method="POST" id="form-cad-ator" enctype="multipart/form-data">

                        <div class="row mb-3">
                            <label for="idFilme" class="col-sm-2 col-form-label">Capa</label>
                            <div class="col-sm-10">
                                <input type="number" name="idFilme" class="form-control" id="idFilme" placeholder="ID dos filmes que o ator participa">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do ator">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-10">
                                <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descreva o ator">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-success btn-sm" value="Cadastrar">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="visAtorModal" tabindex="-1" aria-labelledby="visAtorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visAtorModalLabel">Detalhes do Ator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <dl class="row">
                     <dt class="col-sm-3">ID Ator</dt>
                     <dd class="col-sm-9"><span id="idAtorVis"></span></dd>

                     <dt class="col-sm-3">ID Filme</dt>
                     <dd class="col-sm-9"><span id="idFilmeAtorVis"></span></dd>

                     <dt class="col-sm-3">Nome</dt>
                     <dd class="col-sm-9"><span id="nomeAtorVis"></span></dd>

                     <dt class="col-sm-3">Descrição</dt>
                     <dd class="col-sm-9"><span id="descricaoAtorVis"></span></dd>

                   </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cadDiretorModal" tabindex="-1" aria-labelledby="cadDiretorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadDiretorModalLabel">Cadastrar Diretor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertErroCadDiretor"></span>
                    <form method="POST" id="form-cad-diretor" enctype="multipart/form-data">

                        <div class="row mb-3">
                            <label for="idFilme" class="col-sm-2 col-form-label">Capa</label>
                            <div class="col-sm-10">
                                <input type="number" name="idFilme" class="form-control" id="idFilme" placeholder="ID dos filmes que o diretor dirigiu">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do diretor">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-10">
                                <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descreva o diretor">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-success btn-sm" value="Cadastrar">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="visDiretorModal" tabindex="-1" aria-labelledby="visDiretorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visDiretorModalLabel">Detalhes do Diretor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <dl class="row">
                     <dt class="col-sm-3">ID Diretor</dt>
                     <dd class="col-sm-9"><span id="idDiretorVis"></span></dd>

                     <dt class="col-sm-3">ID Filme</dt>
                     <dd class="col-sm-9"><span id="idFilmeDiretorVis"></span></dd>

                     <dt class="col-sm-3">Nome</dt>
                     <dd class="col-sm-9"><span id="nomeDiretorVis"></span></dd>

                     <dt class="col-sm-3">Descrição</dt>
                     <dd class="col-sm-9"><span id="descricaoDiretorVis"></span></dd>

                   </dl>
                </div>
            </div>
        </div>
    </div>

    <script src="customTabelas.js"> </script>
</body>
</html>