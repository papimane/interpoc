
----------------------------
Instructions de déploiement
----------------------------

1 - Ouvrir le fichier .env à la racine du dépôt 
2 - A la ligne 27 du fichier .env, remplacer 
  - 'password' par votre mot de passe de base de données 
  - 'hote' par l'adresse ip de votre base de données 
  - 'version' par la version de votre base de données 
3 - Ouvrir une fenêtre de ligne de commande et positionnez vous à la racine du dépot 
4 - executer la commande 'composer install' 
5 - Executer la commande 'php bin/console doctrine:schema:create' 
6 - Executer la commande 'curl -sS https://get.symfony.com/cli/installer | bash' 
7 - Executer la commande 'symfony serve'
8 - Executer la commande 'php bin/console doctrine:fixtures:load' 
9 - Ouvrir votre navigateur et aller à l'adresse 'http://127.0.0.1:8000'
---------------------------
Athentification API
---------------------------
1 - Avec postman (ou le client API de votre choix), envoyer une requete POST à l'adresse "https://127.0.0.1:8080/authtoken"
2 - Dans le body de la requete coller le json ci-dessous: 
  {
      "username": "admin",
      "password": "demo123"
  }
3 - Recupérer le token JWT dans le corps de la réponse 
4 - Accéder au swagger à l'adresse "https://127.0.0.1:8000/api/docs"
5 - Cliquer sur le bouton "Authorize"
6 - Saisir dans le champ "value" = Bearer <le token JWT>
