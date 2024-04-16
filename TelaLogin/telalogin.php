<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="telaloginCSS.css">
    <script src="telalogin.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="text-center titulo">
        <p>DON-PENGUIN</p>
    </div>
    <div class="text-center">
        <form name="form" id="form" action="../processo_login.php" enctype="text/plain" method="get" class="custom-form">
            <div class="LabelDeslocamentoEsquerda mb-1">
                <label> Digite seu email: </label>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <input type="email" id="email" name="email" style="width: 80%;" placeholder="Seu email" class="form-control" required />
            </div>
            <div class="LabelDeslocamentoEsquerda mb-1">
                <label> Digite sua senha: </label>
            </div>
            <div class="mb-1 d-flex justify-content-center">
                <input type="password" id="senha" name="senha" style="width: 80%;" placeholder="Sua senha" class="form-control" required />
            </div>
            <div class="mb-4 error-message" id="senha-error"></div>
            <div class="mb-5 d-flex justify-content-center">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Login" class="form-control" style="width: 200px;" />
            </div>
            <p class="Corparacadastro">Ainda não possui uma conta? <a href="../TelaCadastro/telacadastro.html">Clique aqui</a></p>
        </form>
    </div>
</body>
</html>
