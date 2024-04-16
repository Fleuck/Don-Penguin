<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form</title>
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <div class="form">
        <h1 class="text">Cadastro</h1>
        <div class="nome">
            <input type="text" placeholder="Nome" required>
        </div>
        <div class="biografia">
            <textarea placeholder="Biografia" id="biografia" name="biografia"></textarea>
        </div>
        <div class="alternancia">
          <input type="radio" id="ator" name="ocupacao" value="ator">
            <label for="ator">Ator</label>
          <input type="radio" id="diretor" name="ocupacao" value="diretor">
            <label for="diretor">Diretor</label>
        </div>
        <button type="submit" class="botao">Enviar</button>
    </div>
</body>
</html>