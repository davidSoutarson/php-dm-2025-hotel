<?php
// Racine du projet
define('ROOT_DIR', realpath(dirname(__DIR__)) . DIRECTORY_SEPARATOR); // Utilisation de realpath pour obtenir un chemin absolu
// Inclure le fichier autoload.php
require_once ROOT_DIR . 'config/autoload.php';

/**
 * root.php
 * 
 * Ce fichier définit les constantes globales et les chemins nécessaires pour le fonctionnement du projet.
 * Il empêche également l'accès direct et active la gestion des erreurs selon le mode (développement ou production).
 * 
 *  @package php-dm-2025-hotel
 *  @version 1.0.0
 */

// Empêche l'accès direct au fichier root.php
if (!defined('SECURE_ACCESS')) {
    die('Accès direct interdit.');
}

/**
 * Définition des chemins globaux du projet.
 * Ces constantes facilitent l'accès aux répertoires principaux et sous-répertoires.
 */

###### ?????

// Racine du projet
// define('ROOT_DIR', realpath(dirname(__DIR__)) . DIRECTORY_SEPARATOR); // Utilisation de realpath pour obtenir un chemin absolu

###### ?????

// Répertoires principaux
define('CONFIG_DIR', ROOT_DIR . 'config' . DIRECTORY_SEPARATOR);           // Fichiers de configuration
define('CONTROLLERS_DIR', ROOT_DIR . 'controllers' . DIRECTORY_SEPARATOR); // Contrôleurs
define('CSS_DIR', ROOT_DIR . 'css' . DIRECTORY_SEPARATOR); // Feuilles de style CSS
define('DATABASE_DIR', ROOT_DIR . 'database' . DIRECTORY_SEPARATOR);
define('IMAGES_DIR', ROOT_DIR . 'images' . DIRECTORY_SEPARATOR);           // Répertoire des images
define('MODELS_DIR', ROOT_DIR . 'models' . DIRECTORY_SEPARATOR);           // Modèles de données
define('VIEWS_DIR', ROOT_DIR . 'view' . DIRECTORY_SEPARATOR);              // Vues du projet

// Sous-répertoires des contrôleurs
define('CONT_ENTREPRISE_DIR', CONTROLLERS_DIR . 'entreprise' . DIRECTORY_SEPARATOR);   // Contrôleurs liés aux entreprises
define('CONT_UPLOAD_FICHIER_DIR', CONTROLLERS_DIR . 'uploadFichier' . DIRECTORY_SEPARATOR); // Gestion des fichiers téléchargés
define('CONT_UTILISATEUR_DIR', CONTROLLERS_DIR . 'utilisateur' . DIRECTORY_SEPARATOR); // Contrôleurs liés aux utilisateurs

// Sous-répertoires des images
define('IMG_UPLOAD_DIR', IMAGES_DIR . 'upload' . DIRECTORY_SEPARATOR); // Répertoire pour les images téléchargées
define('IMG_PRARTAGEES_DIR', IMAGES_DIR . 'images_partagees' . DIRECTORY_SEPARATOR); // Répertoire pour les images partagees par defo

// Sous-répertoires des modèles
define('MOD_ENTREPRISES_DIR', MODELS_DIR . 'entreprises' . DIRECTORY_SEPARATOR); // Modèles liés aux entreprises
define('MOD_MIGRATIONS_DIR', DATABASE_DIR . 'migrations' . DIRECTORY_SEPARATOR);   // Fichiers de migration de base de données
define('MOD_UTILISATEURS_DIR', MODELS_DIR . 'utilisateurs' . DIRECTORY_SEPARATOR); // Modèles liés aux utilisateurs

// Sous-répertoires des vues
define('VIEW_COMMUN_DIR', VIEWS_DIR . 'commun' . DIRECTORY_SEPARATOR);        // Vues communes (en-tête, pied de page)
define('VIEW_ENTREPRISE_DIR', VIEWS_DIR . 'entreprise' . DIRECTORY_SEPARATOR); // Vues spécifiques aux entreprises
define('VIEW_UTILISATEUR_DIR', VIEWS_DIR . 'utilisateur' . DIRECTORY_SEPARATOR); // Vues spécifiques aux utilisateurs

/**
 * URL et paramètres globaux
 */

// URL de base du site web
define('BASE_URL', 'http://localhost/php-dm-2025-hotel/');

// Nom du site et paramètres de langue
define('SITE_NAME', 'Presque Booking ');      // Nom du projet
define('DEFAULT_LANGUAGE', 'fr');       // Langue par défaut

/**
 * Gestion des erreurs
 * Active ou désactive l'affichage des erreurs selon le mode (DEBUG_MODE).
 */
define('DEBUG_MODE', true); // Changez en false en production
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    // Enregistrer les erreurs dans un fichier log (en plus de l'affichage)
    ini_set('log_errors', 1);
    ini_set('error_log', ROOT_DIR . 'logs/php_errors.log'); // Assurez-vous que le répertoire 'logs' existe et est accessible en écriture
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    // Vous pouvez également enregistrer les erreurs en mode production pour des audits
    ini_set('log_errors', 1);
    ini_set('error_log', ROOT_DIR . 'logs/php_errors.log');
}

/**
 * Autoloading manuel des classes
 * Cette fonction permet de charger automatiquement les classes nécessaires à partir de leurs chemins respectifs.
 */
spl_autoload_register(function ($class) {
    // Convertit le nom de la classe en chemin de fichier
    $file = ROOT_DIR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    // Vérifie si le fichier existe avant de l'inclure
    if (file_exists($file)) {
        require_once $file;
    }
});

/**
 * Inclusion des fichiers de configuration requis
 * Vérifie si les fichiers nécessaires existent avant de les inclure.
 */
$required_files = [
    CONFIG_DIR . 'autoload.php',             // Chargement automatique des classes
    DATABASE_DIR . 'create_database.php', // Permet de créer la base de données
    CONFIG_DIR . 'connection_base_donnees.php' // Connexion à la base de données
];

foreach ($required_files as $file) {
    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Erreur : Le fichier requis {$file} est introuvable.");
    }
}
