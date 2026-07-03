document.addEventListener('DOMContentLoaded', function () {

    // Navbar scroll
    var navbar = document.getElementById('navbar');
    window.addEventListener('scroll', function () {
        navbar.classList.toggle('scrolled', window.scrollY > 10);
    });

    // Menu mobile
    var navToggle = document.getElementById('navToggle');
    var navMobile = document.getElementById('navMobile');
    navToggle.addEventListener('click', function () {
        var isOpen = navMobile.classList.toggle('open');
        navToggle.classList.toggle('active', isOpen);
        navToggle.setAttribute('aria-expanded', isOpen);
    });
    navMobile.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            navMobile.classList.remove('open');
            navToggle.classList.remove('active');
            navToggle.setAttribute('aria-expanded', false);
        });
    });

    // Init Materialize select
    var selects = document.querySelectorAll('select');
    M.FormSelect.init(selects);
});

// Soumission formulaire
function handleContactSubmit(e) {
    e.preventDefault();
    var form = document.getElementById('contactForm');
    var btn = document.getElementById('submitBtn');
    var msg = document.getElementById('successMessage');

    btn.style.display = 'none';
    msg.classList.add('show');

    setTimeout(function () {
        form.reset();
        // Réinitialise le select Materialize
        var selects = document.querySelectorAll('select');
        M.FormSelect.init(selects);
        // Remet les labels en position haute pour les champs avec prefix
        form.querySelectorAll('.input-field').forEach(function (field) {
            if (field.querySelector('.prefix')) {
                var label = field.querySelector('label');
                if (label) label.classList.add('active');
            }
        });
        btn.style.display = 'inline-flex';
        msg.classList.remove('show');
    }, 3000);
}