const form = document.querySelector("#form");
const senhaInput = document.querySelector("#senha");

form.addEventListener("submit", (event) => {
    event.preventDefault();
    if (!senhaValid(senhaInput.value)) {
        document.getElementById("senha-error").textContent = "Email ou senha incorretos.";
        return;
    }

    const email = document.getElementById("email").value;
    const senha = document.getElementById("senha").value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../processo_login.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                if (xhr.responseText === "success") {
                    window.location.href = "../filmesHub/homepage.php";
                } else if(xhr.responseText === "success adm") {
                    window.location.href = "../admin/homepageAdmin.php"
                }
                else {
                    document.getElementById("senha-error").textContent = "Email ou senha incorretos.";
                }
            } else {
                console.error("Erro na requisição AJAX:", xhr.status);
            }
        }
    };
    xhr.send("email=" + email + "&senha=" + senha);
});

function senhaValid(senha) {
    const senharegex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_=+{};:,<.>]).{8,}$/g;
    
    if (senharegex.test(senha)) {
        return true;
    }

    return false;
}
