<?php

/**
 * autoload.php
 * 
 * Ce fichier implémente une fonction d'autoload pour charger automatiquement
 * les classes nécessaires au projet sans avoir à les inclure manuellement.
 * Il prend en charge plusieurs répertoires et gère les namespaces.
 * 
 *  @package php-dm-2025-hotel
 *  @version 1.0.0
 */

/**
 * Fonction d'autoload avec parcours récursif des répertoires
 */
function autoloader($class)
{
    // Chemin racine du projet
    $baseDirectory = __DIR__ . '/../';

    // Conversion du namespace en chemin de fichier
    $classPath = str_replace('\\', '/', $class) . '.php';

    // Recherche récursive dans les répertoires
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($baseDirectory, RecursiveDirectoryIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if (strpos($file, $classPath) !== false) {
            require_once $file;
            return;
        }
    }

    // Gestion des erreurs si la classe n'est pas trouvée
    if (defined('DEBUG_MODE') && DEBUG_MODE) {
        echo "<pre>Erreur : Le fichier pour la classe '{$class}' est introuvable. Chemin recherché : {$classPath}</pre>";
    } else {
        error_log("Autoload : Impossible de charger la classe '{$class}'. Chemin recherché : {$classPath}");
    }
}

spl_autoload_register('autoloader');

/**
 * Configuration des erreurs en fonction de l'environnement
 */
if (defined('DEBUG_MODE') && DEBUG_MODE) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/../logs/php_errors.log');
}

/**
 * Gestionnaire d'erreurs personnalisé.
 */
function handleError($errno, $errstr, $errfile, $errline)
{
    $message = "Erreur [{$errno}] : {$errstr} dans {$errfile} à la ligne {$errline}";

    if (defined('DEBUG_MODE') && DEBUG_MODE) {
        echo "<pre>{$message}</pre>";
    } else {
        error_log($message);
    }
}

set_error_handler('handleError');
