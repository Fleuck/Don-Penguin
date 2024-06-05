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
    select: false,
    ajax: 'usuarios.php',
    scrollX: true,
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

const formNewUser = document.getElementById("form-cad-usuario");
if(formNewUser){
    formNewUser.addEventListener("submit", async(e)=> {
        e.preventDefault();
        const dadosForm = new FormData(formNewUser);
        console.log(dadosForm);

        const dados = await fetch("cadastrarUsuario.php",{
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();
        if (resposta['status']){

        }else{
            document.getElementById("msgAlertErroCadUsuario").innerHTML = resposta['msg'];
        }
    });
}

const formNewMovie = document.getElementById("form-cad-filme");
if(formNewMovie){
    formNewMovie.addEventListener("submit", async(e)=> {
        e.preventDefault();
        const dadosForm = new FormData(formNewMovie);
        console.log(dadosForm);

        const dados = await fetch("cadastrarFilmes.php",{
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if (resposta['status']){

        }else{
            document.getElementById("msgAlertErroCadFilme").innerHTML = resposta['msg'];
        }
    });
}

const formNewActor = document.getElementById("form-cad-ator");
if(formNewActor){
    formNewActor.addEventListener("submit", async(e)=> {
        e.preventDefault();
        const dadosForm = new FormData(formNewActor);
        console.log(dadosForm);

        const dados = await fetch("cadastrarAtor.php",{
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if (resposta['status']){

        }else{
            document.getElementById("msgAlertErroCadAtor").innerHTML = resposta['msg'];
        }
    });
}

const formNewDirector = document.getElementById("form-cad-diretor");
if(formNewDirector){
    formNewDirector.addEventListener("submit", async(e)=> {
        e.preventDefault();
        const dadosForm = new FormData(formNewDirector);
        console.log(dadosForm);

        const dados = await fetch("cadastrarDiretor.php",{
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if (resposta['status']){

        }else{
            document.getElementById("msgAlertErroCadDiretor").innerHTML = resposta['msg'];
        }
    });
}

async function visUsuario(id){
    const dados= await fetch('visualizarUsuario.php?id=' + id);
    const resposta = await dados.json();

    if(resposta['status']){
        const visModal = new bootstrap.Modal(document.getElementById("visUsuarioModal"));
        visModal.show();

        document.getElementById("idUsuario").innerHTML = resposta['dados'].id_usuario;
        document.getElementById("nomeUsuario").innerHTML = resposta['dados'].nome_usuario;
        document.getElementById("aniversarioUsuario").innerHTML = resposta['dados'].nascimento;
        document.getElementById("sexoUsuario").innerHTML = resposta['dados'].genero;
        document.getElementById("emailUsuario").innerHTML = resposta['dados'].email;
        document.getElementById("admUsuario").innerHTML = resposta['dados'].adm;
    }else{
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

async function visFilme(id){
    const dados= await fetch('visualizarFilme.php?id=' + id);
    const resposta = await dados.json();

    if(resposta['status']){
        const visModal = new bootstrap.Modal(document.getElementById("visFilmeModal"));
        visModal.show();

        document.getElementById("idFilmeVis").innerHTML = resposta['dados'].id_filme;
        document.getElementById("capaFilmeVis").innerHTML = resposta['dados'].capa_filme;
        document.getElementById("nomeFilmeVis").innerHTML = resposta['dados'].nome_filme;
        document.getElementById("notaFilmeVis").innerHTML = resposta['dados'].nota_filme;
        document.getElementById("dataFilmeVis").innerHTML = resposta['dados'].lancamento;
        document.getElementById("generoFilmeVis").innerHTML = resposta['dados'].genero_filme;
        document.getElementById("urlFilmeVis").innerHTML = resposta['dados'].url_filme;
        document.getElementById("sinopseFilmeVis").innerHTML = resposta['dados'].sinopse;
    }else{
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

async function visAtor(id){
    const dados= await fetch('visualizarAtor.php?id=' + id);
    const resposta = await dados.json();

    if(resposta['status']){
        const visModal = new bootstrap.Modal(document.getElementById("visAtorModal"));
        visModal.show();

        document.getElementById("idAtorVis").innerHTML = resposta['dados'].id_ator;
        document.getElementById("idFilmeAtorVis").innerHTML = resposta['dados'].id_filme;
        document.getElementById("nomeAtorVis").innerHTML = resposta['dados'].nome_ator;
        document.getElementById("descricaoAtorVis").innerHTML = resposta['dados'].descricao_ator;
    }else{
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

async function visDiretor(id){
    const dados= await fetch('visualizarDiretor.php?id=' + id);
    const resposta = await dados.json();

    if(resposta['status']){
        const visModal = new bootstrap.Modal(document.getElementById("visDiretorModal"));
        visModal.show();

        document.getElementById("idDiretorVis").innerHTML = resposta['dados'].id_diretor;
        document.getElementById("idFilmeDiretorVis").innerHTML = resposta['dados'].id_filme;
        document.getElementById("nomeDiretorVis").innerHTML = resposta['dados'].nome_diretor;
        document.getElementById("descricaoDiretorVis").innerHTML = resposta['dados'].descricao_diretor;
    }else{
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}