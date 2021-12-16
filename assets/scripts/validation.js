const inputs = document.querySelectorAll("input");
const inputPhone = document.querySelector("#phone");

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

function enrollmentValidation() {
    let valid = true;
    let message;
    const homeInstitution = document.querySelector("#home-institution");
    const firstName = document.querySelector("#first-name");
    const lastName = document.querySelector("#last-name");
    const email = document.querySelector("#email");
    const phone = document.querySelector("#phone");
    const course = document.querySelector("#course");
    const semester = document.querySelector("#semester");
    const destinationInstitution = document.querySelector("#destination-institution");
    const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    let phoneSet = phone.value.replace(/[^0-9]/g, "");

    if (firstName.value == "") {
        valid = false;
        inputRequired(firstName, valid);
    }
    if (lastName.value == "") {
        valid = false;
        inputRequired(lastName, valid);
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
    if (phone.value == "") {
        valid = false;
        inputRequired(phone, valid);
    } else if (phoneSet.length <= 10) {
        message = "Número de telefone válido.";
        valid = false;
        createNotification(message, "error");
        inputRequired(phone, valid);
    }
    if (course.value == "") {
        valid = false;
        inputRequired(course, valid);
    }
    if (semester.value == "") {
        valid = false;
        inputRequired(semester, valid);
    } else if (semester.value < 0 && semester.value > 10) {
        message = "O semestre deve ser um número inteiro maior que 0 e menor ou igual a 10.";
        valid = false;
        createNotification(message, "error");
        inputRequired(phone, valid);
    }
    if (homeInstitution.options[homeInstitution.selectedIndex].text == destinationInstitution.options[destinationInstitution.selectedIndex].text) {
        message = "A instituição de destino não pode ser igual a instituição de origem.";
        valid = false;
        createNotification(message, "error");
        inputRequired(homeInstitution, valid);
        inputRequired(destinationInstitution, valid);
    }
    if (valid === true) {
        return true;
    }
    return false;

}

function registerEventValidation() {
    let valid = true;
    const theme = document.querySelector("#theme");
    const local = document.querySelector("#local");
    const date = document.querySelector("#date");

    if (theme.value == "") {
        valid = false;
        inputRequired(theme, valid);
    }
    if (local.value == "") {
        valid = false;
        inputRequired(local, valid);
    }
    if (date.value == "") {
        valid = false;
        inputRequired(date, valid);
    }
    if (valid === true) {
        return true;
    }
    return false;

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
    if (valid === true) {
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

function changeUserValidation() {
    let valid = true;
    let message;
    const username = document.querySelector("#username");
    const email = document.querySelector("#email");
    const password = document.querySelector("#update-password");
    const acessProfile = document.querySelector("#acess-profile");
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
    if (acessProfile.value == "0") {
        message = "Selecione o perfil de acesso.";
        valid = false;
        createNotification(message, "error");
        inputRequired(acessProfile, valid);
    }
    if (valid === true) {
        return true;
    }
    return false;
}

function changeEnrollmentValidation() {
    let valid = true;
    let message;
    const homeInstitution = document.querySelector("#home-institution");
    const firstName = document.querySelector("#first-name");
    const lastName = document.querySelector("#last-name");
    const email = document.querySelector("#email");
    const phone = document.querySelector("#phone");
    const course = document.querySelector("#course");
    const semester = document.querySelector("#semester");
    const destinationInstitution = document.querySelector("#destination-institution");
    const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    let phoneSet = phone.value.replace(/[^0-9]/g, "");

    if (firstName.value == "") {
        valid = false;
        inputRequired(firstName, valid);
    }
    if (lastName.value == "") {
        valid = false;
        inputRequired(lastName, valid);
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
    if (phone.value == "") {
        valid = false;
        inputRequired(phone, valid);
    } else if (phoneSet.length <= 10) {
        message = "Número de telefone válido.";
        valid = false;
        createNotification(message, "error");
        inputRequired(phone, valid);
    }
    if (course.value == "") {
        valid = false;
        inputRequired(course, valid);
    }
    if (semester.value == "") {
        valid = false;
        inputRequired(semester, valid);
    } else if (semester.value < 0 && semester.value > 10) {
        message = "O semestre deve ser um número inteiro maior que 0 e menor ou igual a 10.";
        valid = false;
        createNotification(message, "error");
        inputRequired(phone, valid);
    }
    if (homeInstitution.options[homeInstitution.selectedIndex].text == destinationInstitution.options[destinationInstitution.selectedIndex].text) {
        message = "A instituição de destino não pode ser igual a instituição de origem.";
        valid = false;
        createNotification(message, "error");
        inputRequired(homeInstitution, valid);
        inputRequired(destinationInstitution, valid);
    }
    if (valid === true) {
        return true;
    }
    return false;

}

function changeEventValidation() {
    let valid = true;
    const theme = document.querySelector("#theme");
    const local = document.querySelector("#local");
    const date = document.querySelector("#date");

    if (theme.value == "") {
        valid = false;
        inputRequired(theme, valid);
    }
    if (local.value == "") {
        valid = false;
        inputRequired(local, valid);
    }
    if (date.value == "") {
        valid = false;
        inputRequired(date, valid);
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

if (inputPhone !== null) {
    inputPhone.addEventListener("input", (e) => {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
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