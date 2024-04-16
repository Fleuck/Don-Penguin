const form = document.querySelector("#form");
const nomeInput = document.querySelector("#nome");
const emailInput = document.querySelector("#email");
const senhaInput = document.querySelector("#senha");
const selectElement = document.querySelector("select");

nomeInput.addEventListener("input", function() {
    if (!nomeValid(nomeInput.value)) {
        document.getElementById("name-error").textContent = "Conter 3 a 12 caracteres. Letras maiusculas, minusculas e (._@) ";
    } else {
        document.getElementById("name-error").textContent = "";
    }
});
emailInput.addEventListener("input", function() {
   if (!emailValid(emailInput.value)) {
       document.getElementById("email-error").textContent = "Insira um email válido. Ex: filmes@cinema.com";
   } else {
       document.getElementById("email-error").textContent = "";
   }
});
senhaInput.addEventListener("input", function() {
    if (!senhaValid(senhaInput.value)) {
        document.getElementById("senha-error").textContent = "Mínimo de 8 caracteres. Necessita de um numero e um caracter Ex: Abcde@12";
    } else {
        document.getElementById("senha-error").textContent = "";
    }
 });

form.addEventListener("submit", (event) => {
    event.preventDefault();
    if (!nomeValid(nomeInput.value)) {
        return;
    }
    if (!emailValid(emailInput.value)) {
        return;
    }
    if (!senhaValid(senhaInput.value)) {
        return;
    }

    form.submit();
});

function nomeValid(nome) {
    const nomeregex = /^[a-zA-Z0-9._@]{3,12}$/g;

    if (nomeregex.test(nome)) {
        return true;
    }

    return false;
}

function emailValid(email) {
    const emailregex = /^[a-zA-Z0-9.]+@[a-zA-Z0-9]+\.[a-z]+(\.[a-z]+)?$/g;

    if (emailregex.test(email)) {
        return true;
    }

    return false;
}

function senhaValid(senha) {
    const senharegex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_=+{};:,<.>]).{8,}$/g;


    if (senharegex.test(senha)) {
        return true;
    }

    return false;
}
