const form = document.querySelector("#form");
const nomeInput = document.querySelector("#nome");
const emailInput = document.querySelector("#email");
const senhaInput = document.querySelector("#senha");
const selectElement = document.querySelector("select");

form.addEventListener("submit", (event) => {
    event.preventDefault();
    // Pra ver se está vazio
    if (!nomeValid(nomeInput.value)) {
        alert("Por favor, abrevie seu nome!");
        return;
    }
    if (!emailValid(emailInput.value)) {
        alert("Por favor, preencha seu email corretamente!");
        return;
    }

    if (!senhaValid(senhaInput.value)) {
        alert("Por favor, preencha sua senha corretamente com 8 ou mais dígitos");
        return;
    }

    form.submit();
});

// Validar nome
function nomeValid(nome) {
    const nomeregex = /^[a-zA-Z]+((\s[a-zA-Z]+){0,10})?$/g;

    if (nomeregex.test(nome)) {
        return true;
    }

    return false;
}

// Validar email
function emailValid(email) {
    const emailregex = /^[a-zA-Z0-9.]+@[a-zA-Z0-9]+\.[a-z]+(\.[a-z]+)?$/g;

    if (emailregex.test(email)) {
        return true;
    }

    return false;
}

// Validar senha
function senhaValid(senha) {
    const senharegex = /^[a-zA-Z0-9.-_!@#$%&* ]{8,}$/g;

    if (senharegex.test(senha)) {
        return true;
    }

    return false;
}
