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

const editModal = new bootstrap.Modal(document.getElementById("editUsuarioModal"))
async function editUsuario(id){
    const dados = await fetch('visualizarUsuario.php?id=' + id);
    const resposta = await dados.json();
    if(resposta['status']){
        document.getElementById("msgAlertErroEditUsuario").innerHTML = "";
        document.getElementById("msgAlerta").innerHTML = "";
        editModal.show();

        document.getElementById("editid").value = resposta['dados'].id_usuario;
        document.getElementById("editNome").value = resposta['dados'].nome_usuario;
        document.getElementById("editDataNascimento").value = resposta['dados'].nascimento;
        document.getElementById("editSexo").value = resposta['dados'].genero;
        document.getElementById("editEmail").value = resposta['dados'].email;
        document.getElementById("editAdm").value = resposta['dados'].adm;
    }else {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

const formEditUser = document.getElementById("form-edit-usuario");

if(formEditUser){
    formEditUser.addEventListener("submit", async(e) => {
        e.preventDefault();
        const dadosForm = new FormData(formEditUser);

        const dados = await fetch("editarUsuario.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if(resposta['status']){
            document.getElementById("msgAlertErroEditUsuario").innerHTML = resposta['msg'];
        } else {
            document.getElementById("msgAlertErroEditUsuario").innerHTML = resposta['msg'];
        }
    })
}else {

}

const editModalFilme = new bootstrap.Modal(document.getElementById("editFilmeModal"))
async function editFilme(id){
    const dados = await fetch('visualizarFilme.php?id=' + id);
    const resposta = await dados.json();
    if(resposta['status']){
        document.getElementById("msgAlertErroEditFilme").innerHTML = "";
        document.getElementById("msgAlertaFilme").innerHTML = "";
        editModalFilme.show();

        document.getElementById("editidFilme").value = resposta['dados'].id_filme;
        document.getElementById("capaEdit").value = resposta['dados'].capa_filme;
        document.getElementById("nomeEdit").value = resposta['dados'].nome_filme;
        document.getElementById("notaEdit").value = resposta['dados'].nota_filme;
        document.getElementById("dataEdit").value = resposta['dados'].lancamento;
        document.getElementById("generoEdit").value = resposta['dados'].genero_filme;
        document.getElementById("urlEdit").value = resposta['dados'].url_filme;
        document.getElementById("sinopseEdit").value = resposta['dados'].sinopse;
    }else {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

const formEditFilme = document.getElementById("form-edit-Filme");

if(formEditFilme){
    formEditFilme.addEventListener("submit", async(e) => {
        e.preventDefault();
        const dadosForm = new FormData(formEditFilme);

        const dados = await fetch("editarFilme.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if(resposta['status']){
            document.getElementById("msgAlertErroEditFilme").innerHTML = resposta['msg'];
        } else {
            document.getElementById("msgAlertErroEditFilme").innerHTML = resposta['msg'];
        }
    })
}else {

}

const editModalAtor = new bootstrap.Modal(document.getElementById("editAtorModal"));
async function editAtor(id){
    const dados = await fetch('visualizarAtor.php?id=' + id);
    const resposta = await dados.json();
    if(resposta['status']){
        document.getElementById("msgAlertErroEditAtor").innerHTML = "";
        document.getElementById("msgAlertaAtor").innerHTML = "";
        editModalAtor.show();

        document.getElementById("editidAtor").value = resposta['dados'].id_ator;
        document.getElementById("idFilmeEdit").value = resposta['dados'].id_filme;
        document.getElementById("nomeEditAtor").value = resposta['dados'].nome_ator;
        document.getElementById("descricaoEditAtor").value = resposta['dados'].descricao_ator;
    }else {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

const formEditAtor = document.getElementById("form-edit-ator");

if(formEditAtor){
    formEditAtor.addEventListener("submit", async(e) => {
        e.preventDefault();
        const dadosForm = new FormData(formEditAtor);

        const dados = await fetch("editarAtor.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if(resposta['status']){
            document.getElementById("msgAlertErroEditAtor").innerHTML = resposta['msg'];
        } else {
            document.getElementById("msgAlertErroEditAtor").innerHTML = resposta['msg'];
        }
    })
}else {

}

const editModalDiretor = new bootstrap.Modal(document.getElementById("editDiretorModal"));
async function editDiretor(id){
    const dados = await fetch('visualizarDiretor.php?id=' + id);
    const resposta = await dados.json();
    if(resposta['status']){
        document.getElementById("msgAlertErroEditDiretor").innerHTML = "";
        document.getElementById("msgAlertaDiretor").innerHTML = "";
        editModalDiretor.show();

        document.getElementById("editidDiretor").value = resposta['dados'].id_diretor;
        document.getElementById("idFilmeEditDiretor").value = resposta['dados'].id_filme;
        document.getElementById("nomeEditDiretor").value = resposta['dados'].nome_diretor;
        document.getElementById("descricaoEditDiretor").value = resposta['dados'].descricao_diretor;
    }else {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

const formEditDiretor = document.getElementById("form-edit-diretor");

if(formEditDiretor){
    formEditDiretor.addEventListener("submit", async(e) => {
        e.preventDefault();
        const dadosForm = new FormData(formEditDiretor);

        const dados = await fetch("editarDiretor.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if(resposta['status']){
            document.getElementById("msgAlertErroEditDiretor").innerHTML = resposta['msg'];
        } else {
            document.getElementById("msgAlertErroEditDiretor").innerHTML = resposta['msg'];
        }
    })
}else {

}

async function apagarUsuario(id) {

    var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");

    if (confirmar) {
        const dados = await fetch("apagarUsuario.php?id=" + id);
        const resposta = await dados.json();
        //console.log(resposta);

        if (resposta['status']) {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];

            // Atualizar a lista de registros
            listarDataTables = $('#listar-usuario').DataTable();
            listarDataTables.draw();
        } else {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        }
    }
}

async function apagarAtor(id) {

    var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");

    if (confirmar) {
        const dados = await fetch("apagarAtor.php?id=" + id);
        const resposta = await dados.json();
        //console.log(resposta);

        if (resposta['status']) {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];

            // Atualizar a lista de registros
            listarDataTables = $('#listar-usuario').DataTable();
            listarDataTables.draw();
        } else {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        }
    }
}

async function apagarFilme(id) {

    var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");

    if (confirmar) {
        const dados = await fetch("apagarFilme.php?id=" + id);
        const resposta = await dados.json();
        //console.log(resposta);

        if (resposta['status']) {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];

            // Atualizar a lista de registros
            listarDataTables = $('#listar-usuario').DataTable();
            listarDataTables.draw();
        } else {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        }
    }
}

async function apagarDiretor(id) {

    var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");

    if (confirmar) {
        const dados = await fetch("apagarDiretor.php?id=" + id);
        const resposta = await dados.json();
        //console.log(resposta);

        if (resposta['status']) {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];

            // Atualizar a lista de registros
            listarDataTables = $('#listar-usuario').DataTable();
            listarDataTables.draw();
        } else {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        }
    }
}