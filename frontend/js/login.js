document.addEventListener('DOMContentLoaded', function () {

    // ── NAVBAR SCROLL ──
    var navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            navbar.classList.toggle('scrolled', window.scrollY > 10);
        });
    }

    // ── TOGGLE MOT DE PASSE ──
    var togglePasswordBtn = document.getElementById('togglePassword');
    if (togglePasswordBtn) {
        togglePasswordBtn.addEventListener('click', function () {
            var input = document.getElementById('password');
            var icon = document.getElementById('eyeIcon');
            if (input && icon) {
                var visible = input.type === 'text';
                input.type = visible ? 'password' : 'text';
                icon.classList.toggle('fa-eye', visible);
                icon.classList.toggle('fa-eye-slash', !visible);
            }
        });
    }

    /**
     * Gère la redirection dynamique selon le type d'utilisateur
     * @param {string} type - 'recruteur' ou 'candidat'
     */
    function redirectUserDashboard(type) {
        if (type === 'recruteur') {
            window.location.href = '../pages/dashboard-recruteur.html';
        } else {
            window.location.href = '../pages/dashboard-candidat.html';
        }
    }

    // ── CONNEXION DÉMO (CANDIDAT PAR DÉFAUT) ──
    var demoBtn = document.getElementById('demoBtn');
    if (demoBtn) {
        demoBtn.addEventListener('click', function (e) {
            e.preventDefault();
            var demoUser = { firstName: 'Demo', lastName: 'User', email: 'demo@recrutia.mg', type: 'candidat' };
            localStorage.setItem('currentUser', JSON.stringify(demoUser));
            localStorage.setItem('rc_user', JSON.stringify(demoUser));
            
            showAlert('success', 'Connexion démo réussie ! Redirection...');
            setTimeout(function () { 
                redirectUserDashboard(demoUser.type); 
            }, 1200);
        });
    }

    // ── SOUMISSION DU FORMULAIRE DE CONNEXION ──
    var loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();

            var btn = document.getElementById('submitBtn');
            var emailInput = document.getElementById('email');
            var passwordInput = document.getElementById('password');

            if (!emailInput || !passwordInput) return;

            var email = emailInput.value.trim();
            var password = passwordInput.value;

            if (!email || !password) {
                showAlert('error', 'Veuillez remplir votre email et mot de passe.');
                return;
            }

            if (btn) {
                btn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right:8px;"></i>Connexion en cours...';
                btn.disabled = true;
            }

            setTimeout(function () {
                var stored = localStorage.getItem('rc_user');
                
                // 1. Vérification de l'utilisateur existant en base locale
                if (stored) {
                    var user = JSON.parse(stored);
                    if (user.email === email) {
                        showAlert('success', 'Bienvenue ' + (user.firstName || 'à vous') + ' ! Redirection...');
                        setTimeout(function () { 
                            redirectUserDashboard(user.type); 
                        }, 1200);
                        return;
                    }
                }
                
                // 2. Fallback Démo intelligent (Déduction automatique du rôle pour les tests)
                var lowerEmail = email.toLowerCase();
                var computedType = (lowerEmail.includes('recruteur') || lowerEmail.includes('hr') || lowerEmail.includes('pro')) 
                    ? 'recruteur' 
                    : 'candidat';

                var newUser = { 
                    firstName: 'Utilisateur', 
                    email: email, 
                    type: computedType 
                };
                
                localStorage.setItem('rc_user', JSON.stringify(newUser));
                localStorage.setItem('currentUser', JSON.stringify(newUser));
                
                showAlert('success', 'Connexion réussie ! Redirection...');
                setTimeout(function () { 
                    redirectUserDashboard(newUser.type); 
                }, 1200);

            }, 1200);
        });
    }

});

// ── SYSTÈME D'ALERTES ──
function showAlert(type, message) {
    var box = document.getElementById('alertBox');
    if (box) {
        box.className = 'alert alert-' + type + ' show';
        box.textContent = message;
    }
}