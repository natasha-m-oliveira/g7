const openPopMyAccount = document.querySelector("[data-open-pop-my-account]");
const closePopMyAccount = document.querySelector("[data-close-pop-my-account]");

openPopMyAccount.addEventListener("click", () => {
    const popupMyAccount = document.querySelector("[data-my-account]");
    popupMyAccount.classList.remove("sr-only");
});

closePopMyAccount.addEventListener("click", () => {
    const popupMyAccount = document.querySelector("[data-my-account]");
    popupMyAccount.classList.add("sr-only");
});