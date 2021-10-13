const inputs = document.querySelectorAll("input");
const signupButton = document.querySelectorAll("#signup-btn");

function inputRequired(input, valid) {
    if (!valid) {
        input.classList.add("invalid");
    } else {
        input.classList.remove("invalid");
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

function signupValidation() {
    let valid = true;
    let message;
    const username = document.querySelector("#username");
    const email = document.querySelector("#email");
    const password = document.querySelector("#signup-password");
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
    if(valid === true){
        return true;
    }
    return false;
    
}

function loginValidation() {
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
    if (valid === true) {
        return true;
    }
    return false;
}

function changePasswordValidation() {
    let valid = true;
    let message;
    const currentPassword = document.querySelector("#current-password");
    const newPassword = document.querySelector("#new-password");
    const confirmNewPassword = document.querySelector("#confirm-new-password");
    if (currentPassword.value == "") {
        valid = false;
        inputRequired(currentPassword, valid);
    }
    if (newPassword.value == "") {
        valid = false;
        inputRequired(newPassword, valid);
    } else if (currentPassword.value == newPassword.value) {
        message = "A nova senha não pode ser igual a anterior.";
        valid = false;
        createNotification(message, "error");
        inputRequired(currentPassword, valid);
        inputRequired(newPassword, valid);
    }
    if (confirmNewPassword.value == "") {
        valid = false;
        inputRequired(confirmNewPassword, valid);
    } else if (newPassword.value != confirmNewPassword.value) {
        message = "As senhas não correspondem.";
        valid = false;
        createNotification(message, "error");
        inputRequired(newPassword, valid);
        inputRequired(confirmNewPassword, valid);
    }
    if (valid === true) {
        return true;
    }
    return false;
}

if (inputs[0] !== null) {
    inputs.forEach(input => {
        input.addEventListener("blur", () => {
            if (input.value == "") {
                inputRequired(input, false);
            } else {
                inputRequired(input, true);
            }
        });
    });
}

window.onload = () => {
    if (inputs[0] !== null) {
        inputs.forEach(input => {
            input.classList.remove("invalid");
        });
    }
    const toast = document.querySelector(".toast");
    const notif = toast.querySelector(".server-response");
    if (notif !== null) {
        setTimeout(() => {
            notif.remove();
        }, 3000);
    }
}