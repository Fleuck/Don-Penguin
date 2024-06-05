document.addEventListener("DOMContentLoaded", function() {
    console.log("Document loaded and DOM fully parsed");

    const formNome = document.querySelector("#formNome");
    const formEmail = document.querySelector("#formEmail");
    const formSenha = document.querySelector("#formSenha");

    const nomeInput = document.querySelector("#nome");
    const emailInput = document.querySelector("#email");
    const senhaInput = document.querySelector("#senha");
    const confirmSenhaInput = document.querySelector("#confirm-senha");

    // Validação do nome
    nomeInput.addEventListener("input", function() {
        if (!nomeValid(nomeInput.value)) {
            document.getElementById("name-error").textContent = "Conter 3 a 12 caracteres. Letras maiúsculas, minúsculas e (._@) ";
        } else {
            document.getElementById("name-error").textContent = "";
        }
    });

    formNome.addEventListener("submit", function(event) {
        if (!nomeValid(nomeInput.value)) {
            event.preventDefault();
            console.log("Nome inválido.");
        }
    });

    // Validação do email
    emailInput.addEventListener("input", function() {
        if (!emailValid(emailInput.value)) {
            document.getElementById("email-error").textContent = "Insira um email válido. Ex: filmes@cinema.com";
        } else {
            document.getElementById("email-error").textContent = "";
        }
    });

    formEmail.addEventListener("submit", function(event) {
        if (!emailValid(emailInput.value)) {
            event.preventDefault();
            console.log("Email inválido.");
        }
    });

    // Validação da senha
    senhaInput.addEventListener("input", function() {
        if (!senhaValid(senhaInput.value)) {
            document.getElementById("senha-error").textContent = "Mínimo de 8 caracteres. Necessita de um número e um caractere. Ex: Abcde@12";
        } else {
            document.getElementById("senha-error").textContent = "";
        }
    });

    confirmSenhaInput.addEventListener("input", function() {
        if (!confirmSenhaValid(senhaInput.value, confirmSenhaInput.value)) {
            document.getElementById("confirm-senha-error").textContent = "As senhas não coincidem.";
        } else {
            document.getElementById("confirm-senha-error").textContent = "";
        }
    });

    formSenha.addEventListener("submit", function(event) {
        if (!senhaValid(senhaInput.value) || !confirmSenhaValid(senhaInput.value, confirmSenhaInput.value)) {
            event.preventDefault();
            console.log("Senha inválida.");
        }
    });

    function nomeValid(nome) {
        const nomeregex = /^[a-zA-Z0-9._@]{3,12}$/g;
        return nomeregex.test(nome);
    }

    function emailValid(email) {
        const emailregex = /^[a-zA-Z0-9.]+@[a-zA-Z0-9]+\.[a-z]+(\.[a-z]+)?$/g;
        return emailregex.test(email);
    }

    function senhaValid(senha) {
        const senharegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}$/;
        return senharegex.test(senha);
    }

    function confirmSenhaValid(senha, confirmSenha) {
        return senha === confirmSenha;
    }
});
