# Groupe hôtelier Hypnos

Dans le cadre de l'ECF - Studi 2022 - Mathieu Henrissat
***
Hypnos est un groupe hôtelier fondé en 2004. Propriétaire de 7 établissements dans les quatre coins de l’hexagone, chacun de ces hôtels s’avère être une destination idéale pour les couples en quête d’un séjour romantique à deux.

Chaque suite au design luxueux inclut des services hauts de gamme (un spa privatif notamment), de quoi plonger pleinement dans une atmosphère chic-romantique.

Hypnos souhaiterait ne pas dépendre uniquement de sites tiers comme Booking.com pour la location de ses chambres. C’est pourquoi le groupe hôtelier aimerait être pourvu de son propre système de réservation sur un nouveau site web.

Information importante : Le paiement n'est pas une fonctionnalité à envisager, car il se fait obligatoirement sur place.

***

## Sommaire
1. [Mon projet](#mon-projet)
    - [Développer la partie front-end](#développer-la-partie-front-end)
    - [Développer la partie back-end](#développer-la-partie-back-end)
2. [Installation](#installation)
    - [Initialiser le projet front](#initialiser-le-projet-front)
    - [Initialiser le projet back](#initialiser-le-projet-back)
3. [Technologies](#technologies)

***
## Mon projet
Vous pouvez retrouver mon projet a l'adresse suivante : https://hypnos.netlify.app/

Pour un soucis de sécurité, les routes des admins ne seront pas fournis au public.

### Mes objectifs :

### Développer la partie front-end
1. Maquetter une application
2. Réaliser une interface utilisateur web statique et adaptable
3. Développer une interface utilisateur web dynamique
4. Réaliser une interface utilisateur avec une solution de gestion de contenu ou e-commerce

### Développer la partie back-end
1. Créer une base de données
2. Développer les composants d’accès aux données
3. Développer la partie back-end d’une application web ou web mobile
4. Élaborer et mettre en oeuvre des composants dans une application de gestion de contenu ou e-commerce

***
## Installation
Certains prérequis seront nécéssaire pour un bon démarrage du projet, il vous faudra :

- Xampp / Wampp
- Un serveur : Apache2
- php : v8.x fortement conseillé
- composer
- symfony cli

### Initialiser le projet front
Pour initiliser le projet il vous faut vous diriger dans mon repositrory github https://github.com/Henrissat/hypnos pour la partie front du projet. Vérifier que vous êtes bien sur la branch principal "master" et cliquer sur le bouton Code situé en haut à droite, puis "Download ZIP".
Dezipper le project sur votre machine.
Ou vous pouvez directement utiliser dans votre terminal la commande :

```bash
git clone https://github.com/Henrissat/hypnos 
```
Lancer Xammp ou wamp ou tout autre serveur local. Depuis votre logiciel VsCode ou équivalent mettez vous dans le dossier Hypnos 
```bash
cd hypnos
```
Puis lancer la commande :
```bash
npm start
```

### Initialiser le projet back
Pour initialiser la partie backend il vous faut vous dirigiger dans mon repositrory github https://github.com/Henrissat/server-hypnos pour la partie front du projet. Vérifier que vous êtes bien sur la branch principal "master" et cliquer sur le bouton Code situé en haut à droite, puis "Download ZIP".
Dezipper le project sur votre machine dans le dossier "apps" de xampp.
Merci de bien vérifier vos paramètre de votre fichier "httpd-vhosts.conf" dans le répertoire xampp\apache\conf\extra\

exemple :
```
<VirtualHost *:80>
    ServerName server-hypnos.localhost

    DocumentRoot "C:/xampp/apps/server-hypnos/public"
    DirectoryIndex index.php

    <Directory "C:/xampp/apps/server-hypnos/public">
        Require all granted

        FallbackResource /index.php
    </Directory>
</VirtualHost>
```
Lancer Xammp (ou wamp ou tout autre serveur local). Vérifier de bien avoir toutes les dépendences requises pour le projet. Pour se faire taper dans votre terminal à la racine du projet : 
```bash
composer install
npm install
npm run build
``` 
Mettez le fichier .env en local et paramétrer votre db comme vous le souhaitez : 
```bash
 DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7&charset=utf8mb4"
```
Vous Pourrez créer votre premier Admin en allant 

***
## Technologies
Le projet en cours de développement, merci de votre compréhension. Version stable actuellement en ligne. les améliorations prévues concernant le stockage des images sur AWS ou Cloudinary, la réservation des chambres avec les disponibilités..

### Front-end
- ReactJS
- HTML 5
- CSS 3
- Bootstrap 5
- Javascript
- Netlify serveur

### Back-end
- Symfony (maker)
- Php 8 (composer, nodeJs, npm)
- MySQL
- Heroku serveur (JawsDB)