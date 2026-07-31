document.addEventListener('DOMContentLoaded', function () {
    // 1. Re-initialiser les champs Materialize (active les labels si pré-remplis)
    M.updateTextFields();

    // 2. Masquer / Afficher le mot de passe
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (togglePassword && passwordInput && eyeIcon) {
        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            
            // Basculer l'icône FontAwesome
            eyeIcon.classList.toggle('fa-eye-slash', !isPassword);
            eyeIcon.classList.toggle('fa-eye', isPassword);
        });
    }

    // 3. Gestion du bouton Démo (Remplissage automatique)
    const demoBtn = document.getElementById('demoBtn');
    const emailInput = document.getElementById('email');
    const loginForm = document.getElementById('loginForm');

    if (demoBtn && emailInput && passwordInput) {
        demoBtn.addEventListener('click', function () {
            emailInput.value = 'demo@recrutia.mg';
            passwordInput.value = 'password123';
            M.updateTextFields(); // Force Materialize à remonter les labels

            // Soumettre automatiquement ou laisser l'utilisateur cliquer
            // loginForm.submit(); 
        });
    }

    // 4. Désactiver le bouton au submit pour éviter les doubles envois
    if (loginForm) {
        loginForm.addEventListener('submit', function () {
            const submitBtn = document.getElementById('submitBtn');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Connexion...';
            }
        });
    }
});