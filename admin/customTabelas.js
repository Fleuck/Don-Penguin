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