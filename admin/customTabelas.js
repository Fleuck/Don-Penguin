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
    formNewUser.addEventListener("submit", async(e) => {
        e.preventDefault();
        const dadosForm = new FormData(formNewUser);

        // Obter os valores dos campos
        const nome = dadosForm.get("nome");
        const dataNascimento = dadosForm.get("dataNascimento");
        const capaUser = dadosForm.get("capaUser");
        const sexo = dadosForm.get("sexo");
        const email = dadosForm.get("email");

        // Função para exibir mensagem de erro
        function exibirMensagemErro(mensagem) {
            document.getElementById("msgAlertErroCadUsuario").innerHTML = `<div class="alert alert-danger" role="alert">${mensagem}</div>`;
        }

        // Validação do campo Nome
        const nomeRegex = /^[A-Za-z]{3,}$/;
        if (!nomeRegex.test(nome)) {
            exibirMensagemErro("Nome deve ter pelo menos 3 caracteres e conter apenas letras.");
            return;
        }

        // Validação do campo Aniversário
        const dataNasc = new Date(dataNascimento);
        const hoje = new Date();
        const maioridade = 18;
        if (hoje.getFullYear() - dataNasc.getFullYear() < maioridade ||
            (hoje.getFullYear() - dataNasc.getFullYear() === maioridade && hoje.getMonth() < dataNasc.getMonth()) ||
            (hoje.getFullYear() - dataNasc.getFullYear() === maioridade && hoje.getMonth() === dataNasc.getMonth() && hoje.getDate() < dataNasc.getDate())) {
            exibirMensagemErro("Usuário deve ser maior de 18 anos.");
            return;
        }

        // Validação do campo Foto
        if (!capaUser) {
            exibirMensagemErro("É necessário selecionar uma foto.");
            return;
        }

        // Validação do campo Sexo
        if (!sexo) {
            exibirMensagemErro("É necessário selecionar um sexo.");
            return;
        }

        // Validação do campo E-mail
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            exibirMensagemErro("E-mail inválido. Insira um e-mail válido!");
            return;
        }

        console.log(dadosForm);

        const dados = await fetch("cadastrarUsuario.php",{
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();
        if (resposta['status']){
            $('#cadUsuarioModal').modal('hide');
            $('#usuarios').DataTable().draw();
        }else{
            exibirMensagemErro(resposta['msg']);
        }
    });
}


const formNewMovie = document.getElementById("form-cad-filme");
if (formNewMovie) {
    formNewMovie.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dadosForm = new FormData(formNewMovie);

        // Obter os valores dos campos
        const capa = dadosForm.get("capa");
        const nome = dadosForm.get("nome");
        const nota = dadosForm.get("nota");
        const data = dadosForm.get("data");
        const genero = dadosForm.get("genero");
        const url = dadosForm.get("url");
        const sinopse = dadosForm.get("sinopse");

        // Função para exibir mensagem de erro
        function exibirMensagemErro(mensagem) {
            document.getElementById("msgAlertErroCadFilme").innerHTML = `<div class="alert alert-danger" role="alert">${mensagem}</div>`;
        }

        // Validação dos campos
        const campoRegex = /^.{3,}$/;

        if (!campoRegex.test(capa)) {
            exibirMensagemErro("A URL da capa deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!campoRegex.test(nome)) {
            exibirMensagemErro("O nome do filme deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!nota) {
            exibirMensagemErro("A nota do filme deve ser preenchida.");
            return;
        }

        if (!data) {
            exibirMensagemErro("A data de lançamento deve ser preenchida.");
            return;
        }

        if (!campoRegex.test(genero)) {
            exibirMensagemErro("O gênero do filme deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!campoRegex.test(url)) {
            exibirMensagemErro("A URL do filme deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!campoRegex.test(sinopse)) {
            exibirMensagemErro("A sinopse do filme deve ter pelo menos 3 caracteres.");
            return;
        }

        console.log(dadosForm);

        const dados = await fetch("cadastrarFilmes.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if (resposta['status']) {
            $('#cadFilmeModal').modal('hide');
            $('#filmes').DataTable().draw();
        } else {
            document.getElementById("msgAlertErroCadFilme").innerHTML = resposta['msg'];
        }
    });
}


const formNewActor = document.getElementById("form-cad-ator");
if (formNewActor) {
    formNewActor.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dadosForm = new FormData(formNewActor);

        // Obter os valores dos campos
        const nome = dadosForm.get("nome");
        const descricao = dadosForm.get("descricao");

        // Função para exibir mensagem de erro
        function exibirMensagemErro(mensagem) {
            document.getElementById("msgAlertErroCadAtor").innerHTML = `<div class="alert alert-danger" role="alert">${mensagem}</div>`;
        }

        // Validação dos campos
        const campoRegex = /^.{3,}$/;



        if (!campoRegex.test(nome)) {
            exibirMensagemErro("O nome do ator deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!campoRegex.test(descricao)) {
            exibirMensagemErro("A descrição do ator deve ter pelo menos 3 caracteres.");
            return;
        }

        console.log(dadosForm);

        const dados = await fetch("cadastrarAtor.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if (resposta['status']) {
            $('#cadAtorModal').modal('hide');
            $('#ator').DataTable().draw();
        } else {
            document.getElementById("msgAlertErroCadAtor").innerHTML = resposta['msg'];
        }
    });
}


const formNewDirector = document.getElementById("form-cad-diretor");
if (formNewDirector) {
    formNewDirector.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dadosForm = new FormData(formNewDirector);

        // Obter os valores dos campos
        const nome = dadosForm.get("nome");
        const descricao = dadosForm.get("descricao");

        // Função para exibir mensagem de erro
        function exibirMensagemErro(mensagem) {
            document.getElementById("msgAlertErroCadDiretor").innerHTML = `<div class="alert alert-danger" role="alert">${mensagem}</div>`;
        }

        // Validação dos campos
        const campoRegex = /^.{3,}$/;

        if (!campoRegex.test(nome)) {
            exibirMensagemErro("O nome do diretor deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!campoRegex.test(descricao)) {
            exibirMensagemErro("A descrição do diretor deve ter pelo menos 3 caracteres.");
            return;
        }

        const dados = await fetch("cadastrarDiretor.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if (resposta['status']) {
            $('#cadDiretorModal').modal('hide');
            $('#diretor').DataTable().draw();
            document.getElementById("msgAlertErroCadDiretor").innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;
        } else {
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

        // Obter os valores dos campos
        const nome = dadosForm.get("editNome");
        const dataNascimento = dadosForm.get("editDataNascimento");
        const sexo = dadosForm.get("editSexo");
        const email = dadosForm.get("editEmail");

        // Função para exibir mensagem de erro
        function exibirMensagemErro(mensagem) {
            document.getElementById("msgAlertErroEditUsuario").innerHTML = `<div class="alert alert-danger" role="alert">${mensagem}</div>`;
        }

        // Validação do campo Nome
        const nomeRegex = /^[A-Za-z]{3,}$/;
        if (!nomeRegex.test(nome)) {
            exibirMensagemErro("Nome deve ter pelo menos 3 caracteres e conter apenas letras.");
            return;
        }

        // Validação do campo Aniversário
        const dataNasc = new Date(dataNascimento);
        const hoje = new Date();
        const maioridade = 18;
        if (hoje.getFullYear() - dataNasc.getFullYear() < maioridade ||
            (hoje.getFullYear() - dataNasc.getFullYear() === maioridade && hoje.getMonth() < dataNasc.getMonth()) ||
            (hoje.getFullYear() - dataNasc.getFullYear() === maioridade && hoje.getMonth() === dataNasc.getMonth() && hoje.getDate() < dataNasc.getDate())) {
            exibirMensagemErro("Usuário deve ser maior de 18 anos.");
            return;
        }


        // Validação do campo Sexo
        if (!sexo) {
            exibirMensagemErro("É necessário selecionar um sexo.");
            return;
        }

        // Validação do campo E-mail
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            exibirMensagemErro("E-mail inválido. Insira um e-mail válido!");
            return;
        }

        const dados = await fetch("editarUsuario.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if(resposta['status']){
            $('#editUsuarioModal').modal('hide');
            $('#usuarios').DataTable().draw();
            document.getElementById("msgAlertErroEditUsuario").innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;
        } else {
            document.getElementById("msgAlerta").innerHTML = resposta['msgAlertErroEditUsuario'];
        }
    });
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

if (formEditFilme) {
    formEditFilme.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dadosForm = new FormData(formEditFilme);

        // Obter os valores dos campos
        const capa = dadosForm.get("capaEdit");
        const nome = dadosForm.get("nomeEdit");
        const nota = dadosForm.get("notaEdit");
        const data = dadosForm.get("dataEdit");
        const genero = dadosForm.get("generoEdit");
        const url = dadosForm.get("urlEdit");
        const sinopse = dadosForm.get("sinopseEdit");

        // Função para exibir mensagem de erro
        function exibirMensagemErro(mensagem) {
            document.getElementById("msgAlertErroEditFilme").innerHTML = `<div class="alert alert-danger" role="alert">${mensagem}</div>`;
        }

        // Validação dos campos
        const campoRegex = /^.{3,}$/;

        if (!campoRegex.test(capa)) {
            exibirMensagemErro("A URL da capa deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!campoRegex.test(nome)) {
            exibirMensagemErro("O nome do filme deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!nota) {
            exibirMensagemErro("A nota do filme deve ser preenchida.");
            return;
        }

        if (!data) {
            exibirMensagemErro("A data de lançamento deve ser preenchida.");
            return;
        }

        if (!campoRegex.test(genero)) {
            exibirMensagemErro("O gênero do filme deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!campoRegex.test(url)) {
            exibirMensagemErro("A URL do filme deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!campoRegex.test(sinopse)) {
            exibirMensagemErro("A sinopse do filme deve ter pelo menos 3 caracteres.");
            return;
        }

        const dados = await fetch("editarFilme.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if (resposta['status']) {
            $('#editFilmeModal').modal('hide');
            $('#filmes').DataTable().draw();
            document.getElementById("msgAlertErroEditFilme").innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;
        } else {
            document.getElementById("msgAlertErroEditFilme").innerHTML = resposta['msg'];
        }
    });
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
        document.getElementById("nomeEditAtor").value = resposta['dados'].nome_ator;
        document.getElementById("descricaoEditAtor").value = resposta['dados'].descricao_ator;
    }else {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

const formEditAtor = document.getElementById("form-edit-ator");

if (formEditAtor) {
    formEditAtor.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dadosForm = new FormData(formEditAtor);

        // Obter os valores dos campos
        const nome = dadosForm.get("nomeEditAtor");
        const descricao = dadosForm.get("descricaoEditAtor");

        // Função para exibir mensagem de erro
        function exibirMensagemErro(mensagem) {
            document.getElementById("msgAlertErroEditAtor").innerHTML = `<div class="alert alert-danger" role="alert">${mensagem}</div>`;
        }

        // Validação dos campos
        const campoRegex = /^.{3,}$/;


        if (!campoRegex.test(nome)) {
            exibirMensagemErro("O nome do ator deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!campoRegex.test(descricao)) {
            exibirMensagemErro("A descrição do ator deve ter pelo menos 3 caracteres.");
            return;
        }

        const dados = await fetch("editarAtor.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if (resposta['status']) {
            $('#editAtorModal').modal('hide');
            $('#ator').DataTable().draw();
            document.getElementById("msgAlertErroEditAtor").innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;
        } else {
            document.getElementById("msgAlertErroEditAtor").innerHTML = resposta['msg'];
        }
    });
}

const editModalDiretor = new bootstrap.Modal(document.getElementById("editDiretorModal"));
async function editDiretor(id) {
    const dados = await fetch('visualizarDiretor.php?id=' + id);
    const resposta = await dados.json();
    if (resposta['status']) {
        document.getElementById("msgAlertErroEditDiretor").innerHTML = "";
        document.getElementById("msgAlertaDiretor").innerHTML = "";
        editModalDiretor.show();

        document.getElementById("editidDiretor").value = resposta['dados'].id_diretor;
        document.getElementById("nomeEditDiretor").value = resposta['dados'].nome_diretor;
        document.getElementById("descricaoEditDiretor").value = resposta['dados'].descricao_diretor;
    } else {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

const formEditDiretor = document.getElementById("form-edit-diretor");

if (formEditDiretor) {
    formEditDiretor.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dadosForm = new FormData(formEditDiretor);

        // Obter os valores dos campos
        const nome = dadosForm.get("nomeEditDiretor");
        const descricao = dadosForm.get("descricaoEditDiretor");

        // Função para exibir mensagem de erro
        function exibirMensagemErro(mensagem) {
            document.getElementById("msgAlertErroEditDiretor").innerHTML = `<div class="alert alert-danger" role="alert">${mensagem}</div>`;
        }

        // Validação dos campos
        const campoRegex = /^.{3,}$/;

        if (!campoRegex.test(nome)) {
            exibirMensagemErro("O nome do diretor deve ter pelo menos 3 caracteres.");
            return;
        }

        if (!campoRegex.test(descricao)) {
            exibirMensagemErro("A descrição do diretor deve ter pelo menos 3 caracteres.");
            return;
        }

        const dados = await fetch("editarDiretor.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if (resposta['status']) {
            $('#editDiretorModal').modal('hide');
            $('#diretor').DataTable().draw();
            document.getElementById("msgAlertErroEditDiretor").innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;
        } else {
            document.getElementById("msgAlertErroEditDiretor").innerHTML = resposta['msg'];
        }
    });
}


async function apagarUsuario(id) {

    var confirmar = confirm("Tem certeza que deseja excluir o registro selecionado?");

    if (confirmar) {
        const dados = await fetch("apagarUsuario.php?id=" + id);
        const resposta = await dados.json();
        //console.log(resposta);

        if (resposta['status']) {
            $('#usuarios').DataTable().draw();
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
            $('#ator').DataTable().draw();
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
            $('#filmes').DataTable().draw();
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
            $('#diretor').DataTable().draw();
        } else {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        }
    }
}