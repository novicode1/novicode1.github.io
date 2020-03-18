let navToggler = document.getElementById('main-nav-toggle');
let mainNav = document.getElementById("menu-responsive");

navToggler.addEventListener('click', function () {
    if (mainNav.className === "mainmenu") {
        mainNav.className += " responsive";
    } else {
        mainNav.className = "mainmenu";
    }
});
