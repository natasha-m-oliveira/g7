const openPopMyAccount = document.querySelector("[data-open-pop-up]");
const closePopMyAccount = document.querySelector("[data-close-pop-up]");

if (openPopMyAccount !== null) {
    openPopMyAccount.addEventListener("click", () => {
        const popupMyAccount = document.querySelector("[data-form-pop-up]");
        popupMyAccount.classList.remove("sr-only");
    });
}

if (closePopMyAccount !== null) {
    closePopMyAccount.addEventListener("click", () => {
        const popupMyAccount = document.querySelector("[data-form-pop-up]");
        popupMyAccount.classList.add("sr-only");
    });
}