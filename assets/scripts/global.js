const menuItems = document.querySelectorAll("[data-menu-item]");
const btnMobile = document.querySelector("[data-btn-mobile]");
const body = document.querySelector("body");
const page = window.location.pathname;

if (menuItems[0] !== null) {
    menuItems.forEach(menuItemClick => {
        menuItemClick.addEventListener("click", () => {
            if (!menuItemClick.classList.contains("current")) {
                menuItems.forEach(menuItem => {
                    menuItem.classList.remove("current");
                });
                menuItemClick.classList.add("current");
            }
            const nav = document.querySelector("[data-nav]");
            let windowSize = window.innerWidth;
            nav.classList.remove("active");
            if (windowSize <= 600 && btnMobile !== null) {
                btnMobile.currentTarget.setAttribute("aria-label", "Abrir menu");
            }
        });
    });
}

function toggleMenu(event) {
    //Previne no caso do mobile que o menu seja aberto e fechado na sequência
    if (event.type === "touchstart") {
        event.preventDefault();
    }
    const nav = document.querySelector("[data-nav]");
    //Toggle adiciona ou remova caso tenha a classe
    nav.classList.toggle("active");
    //Para melhorar a acessibilidade
    const active = nav.classList.contains("active");
    event.currentTarget.setAttribute("aria-expanded", active);
    if (active) {
        body.classList.add("menu-active");
        event.currentTarget.setAttribute("aria-label", "Fechar menu");
    } else {
        body.classList.remove("menu-active");
        event.currentTarget.setAttribute("aria-label", "Abrir menu");
    }
}

window.addEventListener("scroll", () => {
    const anchor = document.querySelector("[data-anchor]");
    let windowPosition = this.scrollY;
    if (anchor !== null){
        if (windowPosition >= 500) {
            anchor.classList.add("visible");
        } else {
            anchor.classList.remove("visible");
        }
    }
});

if (btnMobile !== null) {
    btnMobile.addEventListener("click", toggleMenu);
    //Aciona o evento de clique assim que executado
    btnMobile.addEventListener("touchstart", toggleMenu);
}

if (page === "/gallery.php") {
    document.title = 'Galeria | G7';
    let i = 0;
    const countMenuItem = menuItems.length;
    while (i < countMenuItem) {
        menuItems[i].classList.remove("current");
        let href = menuItems[i].getAttribute("href");
        href = href.replace("#", "index.php#");
        menuItems[i].href = href;
        i++;
    }
    menuItems[5].classList.add("current");
}