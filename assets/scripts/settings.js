const menuToggle = document.querySelector("[data-menu-toggle]");
const navigation = document.querySelector("[data-nav]");
const typed = document.querySelector("[data-typed-words]");
let page = window.location.href;
let home = window.location.pathname;
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
        if (list[i].children[0].href == page) {
            list[i].children[0].className = 'current';
        } else if (home == '/settings') {
            list[1].children[0].className = 'current';
        }
        i++;
    }
})();

menuToggle.addEventListener("click", () => {
    menuToggle.classList.toggle("active");
    navigation.classList.toggle("active");
});