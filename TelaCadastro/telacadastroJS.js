const form = document.querySelector("#form");
const nomeInput = document.querySelector("#nome");
const emailInput = document.querySelector("#email");
const senhaInput = document.querySelector("#senha");
const dateInput = document.querySelector("#nascimento");
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
        document.getElementById("name-error").textContent = "Conter 3 a 12 caracteres. Letras maiúsculas, minúsculas e (._@)";
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
        document.getElementById("senha-error").textContent = "Mínimo de 8 caracteres. Necessita de um número e um caractere Ex: Abcde@12";
    } else {
        document.getElementById("senha-error").textContent = "";
    }
});

dateInput.addEventListener("input", function() {
    if (!dateValid(dateInput.value)) {
        document.getElementById("date-error").textContent = "Você deve ter pelo menos 18 anos.";
    } else {
        document.getElementById("date-error").textContent = "";
    }
});

form.addEventListener("submit", (event) => {
    event.preventDefault();

    if (!nomeValid(nomeInput.value) || !emailValid(emailInput.value) || !senhaValid(senhaInput.value) || !confirmSenhaValid(senhaInput.value, confirmSenhaInput.value) || !dateValid(dateInput.value)) {
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
    const nomeregex = /^[a-zA-Z0-9._@]{3,12}$/;
    return nomeregex.test(nome);
}

function emailValid(email) {
    const emailregex = /^[a-zA-Z0-9.]+@[a-zA-Z0-9]+\.[a-z]+(\.[a-z]+)?$/;
    return emailregex.test(email);
}

function senhaValid(senha) {
    const senharegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}$/;
    return senharegex.test(senha);
}

function dateValid(dateString) {
    var birthDate = new Date(dateString);
    var currentDate = new Date();
    var age = currentDate.getFullYear() - birthDate.getFullYear();
    var monthDifference = currentDate.getMonth() - birthDate.getMonth();
    var dayDifference = currentDate.getDate() - birthDate.getDate();

    if (monthDifference < 0 || (monthDifference === 0 && dayDifference < 0)) {
        age--;
    }

    return !isNaN(birthDate.getTime()) && birthDate <= currentDate && age >= 18;
}
