const typed = document.querySelector("[data-typed-words]");
const userName = typed.innerHTML;

const messages = [`Olá, ${userName}.`, `Seja bem-vindo(a)!`];

let messageIndex = 0;
let characterIndex = 0;
let currentMessage = '';
let currentCharacters = '';

const type = () => {
    const shouldTypeFirstMessage = messageIndex === messages.length;

    if(shouldTypeFirstMessage){
        messageIndex = 0;
    }
    currentMessage = messages[messageIndex];
    currentCharacters = currentMessage.slice(0, characterIndex++);
    typed.textContent = currentCharacters;

    const shouldChangeMessageToBeTyped = currentCharacters.length === currentMessage.length;
    if(shouldChangeMessageToBeTyped){
        messageIndex++;
        characterIndex = 0;
    }
}

setInterval(type, 200);