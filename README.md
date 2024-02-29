# Boîte à idées collaboratives - InnovateTech Solutions

Bienvenue sur notre plateforme de boîte à idées collaborative, où l'innovation prend vie !

## Description

Notre application a été conçue pour faciliter l'organisation de la vie collaborative au sein de votre équipe. Elle offre un espace où les utilisateurs peuvent partager, discuter et développer des idées de manière collaborative, dans un environnement ludique et convivial.

## Technologie utilisée

- **PHP 8 :** Nous utilisons la dernière version de PHP pour garantir des performances optimales et une sécurité accrue.
- **MySQL 8.0.36-0ubuntu0.23.10.1 :** Notre choix s'est porté sur MySQL comme SGBD pour stocker les données de manière efficace et fiable.
- **PDO :** Nous utilisons PDO comme driver pour connecter notre application PHP à la base de données.
- **Apache 2**

## Installation

1. Clonez le dépôt. [https://github.com/ndourmouhammad/boite-a-idees.git](https://github.com/ndourmouhammad/boite-a-idees.git)
2. Configurez la base de données en éditant le fichier `cnx.php` avec les informations de connexion à votre base de données MySQL.
3. Importez la structure de la base de données à l'aide du fichier SQL fourni (`idee_db.sql`).
4. Assurez-vous que votre serveur Apache est configuré pour pointer vers le répertoire public de l'application.
5. Accédez à l'application via votre navigateur préféré.

## Structure du Projet

- `cnx.php` : Fichier de configuration pour la connexion à la base de données.
- `idee_db.sql` : fichier sql de la base de données.
- Dossier `styles` : contient les codes CSS des fichiers.
- `inscription.php` : formulaire et traitement de l'inscription d'un utilisateur.
- `inscription_réussie.php` : message pour confirmer que l'inscription a bien réussi.
- `login.php` : fichier d'authentification.
- `deconnexion.php` : fichier pour la déconnexion.
- `index.php` : la page d'accueil.
- `header.php` : le code de l'en-tête des pages.
- `detail.php` : le fichier de détail de chaque idée fournie.
- `addIdea.php` : formulaire d'ajout des idées.
- `ideeAjoute.php` : formulaire de traitement pour l'ajout des idées.
- `update.php` : formulaire de modification des idées.
- `traitement-update.php` : fichier de traitement pour la modification des idées.
- `delete.php` : formulaire et traitement de la suppression d'une idée.
- `delete_réussie.php` : message pour confirmer que la suppression a bien réussi.

## Fonctionnalités

- **Système d'authentification :** Les utilisateurs peuvent s'authentifier pour accéder aux idées s'ils disposent d'un compte. Sinon, ils peuvent s'inscrire.
- **Création d'idées :** Les utilisateurs peuvent proposer de nouvelles idées en quelques clics.
- **Modification des idées :** Une fois une idée proposée, les utilisateurs peuvent la modifier pour l'améliorer ou la préciser.
- **Suppression des idées :** Les utilisateurs ont la possibilité de supprimer les idées qu'ils estiment ne plus être pertinentes.
- **Masquage des idées validées :** Une fois qu'un utilisateur a validé une idée, celle-ci peut être masquée pour éviter les doublons et faciliter la visualisation des idées restantes.
- **Catégorisation des idées :** Les utilisateurs peuvent catégoriser leurs idées en fonction de différents critères.

## Design

Le design de notre application a été pensé pour être à la fois ludique et coloré, afin de stimuler la créativité et de rendre l'expérience utilisateur agréable.
