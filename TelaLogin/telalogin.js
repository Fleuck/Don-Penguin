const form = document.querySelector("#form");
const senhaInput = document.querySelector("#senha");

form.addEventListener("submit", (event) => {
    event.preventDefault();
    if (!senhaValid(senhaInput.value)) {
        document.getElementById("senha-error").textContent = "Senha ou login inválidos";
        return;
    }

    form.submit();
});

function senhaValid(senha) {
    const senharegex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_=+{};:,<.>]).{8,}$/g;
    
    if (senharegex.test(senha)) {
        return true;
    }

    return false;
}