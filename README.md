# phptest2024

![PHP](https://img.shields.io/badge/PHP-%3E=8.0-blue) ![MySQL](https://img.shields.io/badge/MySQL-%3E=5.7-orange) ![License](https://img.shields.io/badge/license-MIT-green)

## Description

Ce projet est une application web de gestion d'hôtels et de réservations. Elle permet aux entreprises de gérer leurs établissements et aux utilisateurs de faire des réservations en ligne.

---

## Sommaire

1. [Description](#description)
2. [Fonctionnalités principales](#fonctionnalités-principales)
3. [Pré-requis](#pré-requis)
4. [Structure du projet](#structure-du-projet)
5. [Organisation et gestion du projet](#organisation-et-gestion-du-projet)
6. [Installation](#installation)
7. [Notes supplémentaires](#notes-supplémentaires)

---

## Fonctionnalités principales

- **Inscription des utilisateurs et des entreprises** : Simplifiez l'accès et la gestion.
- **Gestion des hôtels** : Ajout, modification et suppression d'hôtels.
- **Réservation intuitive** :Système de réservation pour les utilisateurs.
- **Ajout de descriptions d'hôtels** : Fournissez des informations détaillées pour chaque hôtel.
- **Gestion des images** : Illustrez les hôtels et chambres avec des images attrayantes.

Exemple de capture d'écran des fonctionnalitées principale.

---

## Pré-requis

- **PHP** 8.0 ou plus récent.
- Serveur web (Apache ou Nginx).
- Base de données MySQL 5.7 ou plus récent.

### Optionnel

- **Composer** (pour la gestion des dépendances) :  
  Bien que ce projet soit autonome et ne nécessite pas de dépendances tierces, Composer peut être utilisé pour préparer le projet à une éventuelle évolution ou pour gérer l'autoloading.

#### Quand Composer est-il optionnel ?

- **Projet sans dépendances tierces** : Si vous n’utilisez pas de bibliothèques externes et gérez manuellement l'autoloading dans le fichier `autoload.php`.
- **Petits projets ou prototypes** : Si votre projet reste simple, Composer n'est pas strictement nécessaire.

---

## Structure du projet

### Dossiers principaux

- **`config/`** : Fichiers de configuration générale (connexion à la base de données, constantes globales, etc.).
- **`controllers/`** : Contient les contrôleurs responsables de la logique métier.
  - **`entreprise/`** : Actions liées aux entreprises (ex. : ajout d'un hôtel).
  - **`utilisateur/`** : Actions liées aux utilisateurs (ex. : réservation).
- **`css/`** : Fichiers CSS pour le style.
- **`database/`** : Scripts de création et de migration des tables.
- **`images/`** : Stockage des fichiers image, organisés par catégories (hôtels, chambres, etc.).
- **`logs/`** : Fichiers de journalisation pour les erreurs et l'activité.
- **`models/`** : Interactions avec la base de données, organisées par entité (utilisateurs, entreprises, etc.).
- **`view/`** : Rendu des interfaces utilisateur (HTML/PHP), organisé par domaine fonctionnel.
- **`index.php`** : Point d'entrée principal du projet.

---

## Organisation et gestion du projet

### Architecture du code

- **Paradigme MVC** : Le projet suit une architecture Model-View-Controller (MVC) bien définie.
- **Conventions PSR** :
  - **PSR-4** : Chargement automatique des classes.
  - **PSR-12** : Style de codage standardisé.
- **Style de nommage** :
  - `PascalCase` pour les noms des classes.
  - `snake_case` pour les noms de fichiers qui ne contiennent pas de classes.
- **Noms de fichiers descriptifs** :
  - Les préfixes `create_`, `view_`, et `form_` aident à identifier rapidement la fonction du fichier.

---

### Gestion de la base de données

#### Création initiale

Lors de la première installation du projet, exécutez `create_database.php` pour créer la base de données et ses tables initiales.

#### Gestion des modifications

Si vous ajoutez de nouvelles fonctionnalités nécessitant des changements dans la base de données :

1. **Créez une migration** : Par exemple, `003_create_table_reviews.php` dans le dossier `/migrations`.
2. **Exécutez la migration** : Pour mettre à jour la base de données avec les modifications.

#### Suivi des versions

Pour garantir la synchronisation de la base de données entre les environnements :

- **Appliquez les migrations** dans le bon ordre sur tous les environnements (développement, test, production).
- **Documentez chaque migration** avec des détails sur les modifications apportées.
- Si possible, **automatisez le processus** à l'aide d'outils ou de scripts.

#### Avantages des migrations

Les migrations permettent une gestion traçable et incrémentale des modifications de la structure de la base de données, garantissant que tous les environnements restent alignés.

---

## Installation

### Étape 1 : Cloner le dépôt

```bash
git clone https://votre-url-depot.git
```

### Étape 2 : Configurer la base de données

1. Ouvrez le fichier `config/connection_base_donnees.php`.
2. Configurez les informations d'accès à la base de données (hôte, nom de la base, utilisateur, mot de passe).

### Étape 3 : Créer la base de données

Exécutez le script de création de la base de données :

```bash
php database/create_database.php
```

### Étape 4 : Lancer le serveur local

#### Avec PHP intégré

```bash
php -S localhost:8000
```

#### Avec WampServer ,Laragon , MAMP ou un autre server locale de votre choix

1. Installez WampServer ou Laragon si ce n’est pas déjà fait.
2. Placez le projet dans le répertoire `www` (pour Wamp) ou (pour Laragon) `htdocs` MAMP.
3. Lancez WampServer ou Laragon.
4. Accédez au projet via :
   - **Wamp** : `http://localhost/phptest2024`
   - **Laragon** : `http://localhost/phptest2024`

---

## Notes supplémentaires

- **WampServer** et **Laragon** simplifient la gestion de l’environnement de développement local.
- Ils incluent Apache, MySQL, et PHP, ce qui rend la configuration rapide et pratique.
- Ces outils sont particulièrement utiles pour les développeurs débutants ou pour accélérer le déploiement local.

---
