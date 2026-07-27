# Recurtia

## Lancer le projet

Installer les dépendances :

composer install

Lancer le serveur Laravel :

php artisan serve


## Accéder au front

Après le lancement du serveur, ouvrir :

http://127.0.0.1:8000


## Pages principales

- Accueil :
  http://127.0.0.1:8000/

- Connexion :
  http://127.0.0.1:8000/login

- Inscription :
  http://127.0.0.1:8000/register

- Dashboard candidat :
  http://127.0.0.1:8000/dashboard

- Profil :
  http://127.0.0.1:8000/profile

- Mes candidatures :
  http://127.0.0.1:8000/candidatures


## Front-end

Les interfaces sont dans :

resources/views/

Principales vues :

- resources/views/auth/login.blade.php
- resources/views/dashboard/candidat.blade.php
- resources/views/profile/edit.blade.php
- resources/views/candidatures/index.blade.php