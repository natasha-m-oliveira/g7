const menuToggle = document.querySelector("[data-menu-toggle]");
const navigation = document.querySelector("[data-nav]");
const typed = document.querySelector("[data-typed-words]");
let locationHref = window.location.href;
let locationOrigin = window.location.origin;
let locationPathname = window.location.pathname;
let newLocationHref = locationOrigin+locationPathname;
let list = document.querySelectorAll(".list");

if (typed !== null) {
    const userName = typed.innerHTML;

    const messages = [`Olá, ${userName}.`, `Seja bem-vindo(a)!`];

    let messageIndex = 0;
    let characterIndex = 0;
    let currentMessage = '';
    let currentCharacters = '';

    const type = () => {
        const shouldTypeFirstMessage = messageIndex === messages.length;

        if (shouldTypeFirstMessage) {
            messageIndex = 0;
        }
        currentMessage = messages[messageIndex];
        currentCharacters = currentMessage.slice(0, characterIndex++);
        typed.textContent = currentCharacters;

        const shouldChangeMessageToBeTyped = currentCharacters.length === currentMessage.length;
        if (shouldChangeMessageToBeTyped) {
            messageIndex++;
            characterIndex = 0;
        }
    }

    setInterval(type, 200);
}

(() => {
    let i = 0; 
    while (i < list.length) {
        list[i].children[0].classList.remove("current");
        if (list[i].children[0].href == locationHref) {
            list[i].children[0].className = 'current';
        } else if (locationPathname == '/settings' || locationPathname == '/settings/') {
            list[1].children[0].className = 'current';
        } else if (list[i].children[0].href == newLocationHref) {
            list[i].children[0].className = 'current';
        }
        i++;
    }
})();

menuToggle.addEventListener("click", () => {
    menuToggle.classList.toggle("active");
    navigation.classList.toggle("active");
});