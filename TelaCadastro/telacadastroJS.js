const form = document.querySelector("#form");
const nomeInput = document.querySelector("#nome");
const emailInput = document.querySelector("#email");
const senhaInput = document.querySelector("#senha");
const selectElement = document.querySelector("select");
const dateInput = document.querySelector("#date");
const confirmSenhaInput = document.querySelector("#confirm-senha");

confirmSenhaInput.addEventListener("input", function() {
    if (!confirmSenhaValid(senhaInput.value, confirmSenhaInput.value)) {
        document.getElementById("confirm-senha-error").textContent = "As senhas não coincidem.";
    } else {
        document.getElementById("confirm-senha-error").textContent = "";
    }
});

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

dateInput.addEventListener("input", function() {
    var birthDate = new Date(dateInput.value);
    var currentDate = new Date();
    var age = currentDate.getFullYear() - birthDate.getFullYear();

    if (isNaN(birthDate) || birthDate > currentDate || age < 18) {
        document.getElementById("date-error").textContent = "Você deve ter pelo menos 18 anos.";
    } else {
        document.getElementById("date-error").textContent = "";
    }
});

form.addEventListener("submit", (event) => {
    event.preventDefault();

    if (!nomeValid(nomeInput.value) || !emailValid(emailInput.value) || !senhaValid(senhaInput.value) || !dateValid(dateInput.value) || !confirmSenhaValid(senhaInput.value, confirmSenhaInput.value)) {
        return;
    }

    var email = emailInput.value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../verificar_email.php?email=" + email, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                try {
                    if (xhr.responseText === "existe") {
                        document.getElementById("email-error").textContent = "Este email já está em uso.";
                    } else {
                        form.submit();
                    }
                } catch (error) {
                    console.error("Erro ao processar a resposta do servidor:", error);
                }
            } else {
                console.error("Ocorreu um erro ao verificar o email. Status da resposta:", xhr.status);
            }
        }
    };
    xhr.send();
});

function confirmSenhaValid(senha, confirmSenha) {
    return senha === confirmSenha;
}


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

function dateValid(dateString) {
    var birthDate = new Date(dateString);
    var currentDate = new Date();
    var age = currentDate.getFullYear() - birthDate.getFullYear();

    return !isNaN(birthDate) && birthDate <= currentDate && age >= 18;
}
