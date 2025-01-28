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
 * Fonction d'autoload améliorée
 * 
 * Cette fonction recherche automatiquement le fichier correspondant à une classe donnée.
 * Elle suit les conventions suivantes :
 * - Les classes sont réparties dans plusieurs répertoires (`models/`, `controllers/`, `views/`).
 * - Les namespaces sont convertis en chemins de fichiers.
 * - Les fichiers doivent avoir l'extension `.php`.
 * 
 * @param string $class Nom complet de la classe (incluant les namespaces, si applicables).
 */
function autoloader($class)
{
    // Liste des répertoires où les classes peuvent être trouvées
    $directories = [
        __DIR__ . '/models/',       // Répertoire des modèles
        __DIR__ . '/controllers/',  // Répertoire des contrôleurs
        __DIR__ . '/views/',        // Répertoire des vues (si nécessaire)
    ];

    // Conversion du namespace en chemin de fichier
    $classPath = str_replace('\\', '/', $class) . '.php';

    // Recherche dans chaque répertoire
    foreach ($directories as $directory) {
        // Construction du chemin complet du fichier
        $filePath = $directory . $classPath;

        // Si le fichier existe et est lisible, on l'inclut
        if (file_exists($filePath) && is_readable($filePath)) {
            require_once $filePath;
            return; // La classe a été chargée, on arrête la recherche
        }
    }

    // Si la classe n'a pas été trouvée, gestion des erreurs
    if (defined('DEBUG_MODE') && DEBUG_MODE) {
        // Affichage d'un message d'erreur détaillé en développement
        echo "<pre>Erreur : Le fichier pour la classe '{$class}' est introuvable. Chemin recherché : {$classPath}</pre>";
    } else {
        // Enregistrement de l'erreur dans le fichier log en production
        error_log("Autoload : Impossible de charger la classe '{$class}'. Chemin recherché : {$classPath}");
    }
}

// Enregistrement de la fonction d'autoload
spl_autoload_register('autoloader');
