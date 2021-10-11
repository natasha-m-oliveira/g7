const inputs = document.querySelectorAll("input");
const signupButton = document.querySelector("#signup-btn");
const loginButton = document.querySelector("#login-btn");
let ready = false;

function inputRequired(input, valid) {
    if (ready) {
        if (input.value == "" || !valid) {
            input.classList.add("invalid");
        } else {
            input.classList.remove("invalid");
        }
    }
}

function createNotification(message, type) {
    const toast = document.querySelector(".toast");
    const notif = document.createElement("div");
    if (type == "error") {
        notif.classList.add("error-msg");
    } else if (type == "success") {
        notif.classList.add("success-msg");
    }
    notif.innerText = message;

    toast.appendChild(notif);

    setTimeout(() => {
        notif.remove();
    }, 3000);
}
if (signupButton !== null) {
    signupButton.addEventListener("click", () => {
        let valid = true;
        let message;
        const username = document.querySelector("#username");
        const email = document.querySelector("#email");
        const password = document.querySelector("#signup-passwords");
        const confirmPassword = document.querySelector("#confirm-password");
        const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

        if (username.value == "") {
            valid = false;
            inputRequired(username, valid);
        }
        if (email.value == "") {
            valid = false;
            inputRequired(email, valid);
        } else if (!(emailRegex.test(email.value))) {
            message = "E-mail inválido.";
            valid = false;
            createNotification(message, "error");
            inputRequired(email, valid);
        }
        if (password.value == "") {
            valid = false;
            inputRequired(password, valid);
        }
        if (confirmPassword.value == "") {
            valid = false;
            inputRequired(confirmPassword, valid);
        } else if (password.value != confirmPassword.value) {
            message = "Digite a senha corretamente.";
            valid = false;
            createNotification(message, "error");
            inputRequired(password, valid);
            inputRequired(confirmPassword, valid);
        }
    });
}

if (loginButton !== null) {
loginButton.addEventListener("click", () => {
    let valid = true;
    const username = document.querySelector("#username");
    const password = document.querySelector("#login-password");
    if (username.value == "") {
        valid = false;
        inputRequired(username, valid);
    }
    if (password.value == "") {
        valid = false;
        inputRequired(password, valid);
    }
});
}

inputs.forEach(input => {
    input.addEventListener("blur", inputRequired(input, true));
});

function signupValidation(valid) {
    return valid;
}

function loginValidation(valid) {
    return valid;
}

window.onload = () => {
    ready = true;
    const toast = document.querySelector(".toast");
    const notif = toast.querySelector(".server-response");
    if (notif !== null) {
        setTimeout(() => {
            notif.remove();
        }, 3000);
    }
}