    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
        <link rel="stylesheet" href="telacadastroCSS.css">
        <script src="telacadastroJS.js" defer></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="text-center titulo">
            <h1>Cadastro</h1>
        </div>
        <div class="text-center">
            <form name="form" id="form" action="../TelaLogin/telalogin.html" enctype="text/plain" method="get"
                class="custom-form">
                <div class="LabelDeslocamentoEsquerda mb-1">
                    <label> Digite seu nome de usuário: </label>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="text" id="nome" name="nome" style="width: 400px;" placeholder="Seu nome"
                        class="form-control" required/>
                </div>
                <div class="mb-5 error-message" id="name-error"></div>
                <div class="LabelDeslocamentoEsquerda mb-1">
                    <label> Digite seu email: </label>
                </div>
                    <div class="mb-5 d-flex justify-content-center">
                        <input type="email" id="email" name="email" style="width: 400px;" placeholder="Seu email"
                            class="form-control" required />
                            <br><div class="error-message" id="email-error"></div>
                    </div>
                <div class="LabelDeslocamentoEsquerda mb-1">
                    <label> Crie sua nova senha: </label>
                </div>
                <div class="mb-5 d-flex justify-content-center">
                    <input type="password" id="senha" name="senha" style="width: 400px;" placeholder="Sua senha"
                        class="form-control" required />
                </div>
                <div class="GeneroDeslocamentoDireita mb-5 d-flex justify-content-center">
                    <select class="form-select" aria-label="Default select example" style="width: 200px" required>
                        <option value="" disabled selected hidden>Escolha seu gênero: </option>
                        <option value="1">Masculino</option>
                        <option value="2">Feminino</option>
                        <option value="3">Outros</option>
                    </select>
                </div>
                <div class="mb-5 d-flex justify-content-center">
                    <input type="submit" id="btnSubmit" name="btnSubmit" value="Enviar" class="form-control"
                        style="width: 200px;" />
                </div>
            </form>
        </div>
    </body>

    </html>
