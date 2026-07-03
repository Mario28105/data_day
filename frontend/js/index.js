
document.addEventListener('DOMContentLoaded', function () {
    var navToggle = document.getElementById('navToggle');
    var navMobile = document.getElementById('navMobile');

    navToggle.addEventListener('click', function () {
        var isOpen = navMobile.classList.toggle('open');
        navToggle.classList.toggle('active', isOpen);
        navToggle.setAttribute('aria-expanded', isOpen);
    });

    // Ferme le menu mobile au clic sur un lien
    navMobile.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            navMobile.classList.remove('open');
            navToggle.classList.remove('active');
            navToggle.setAttribute('aria-expanded', false);
        });
    });

    // Ombre de la navbar au scroll
    var navbar = document.getElementById('navbar');
    window.addEventListener('scroll', function () {
        navbar.classList.toggle('scrolled', window.scrollY > 10);
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // FAQ Collapsible
    var elems = document.querySelectorAll('.collapsible');
    M.Collapsible.init(elems, { accordion: true });
});