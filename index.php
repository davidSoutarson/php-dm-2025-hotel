<?php
// Définir la constante de sécurité avant d'inclure root.php
define('SECURE_ACCESS', true);

// Inclure le fichier root.php qui contient les constantes globales et les configurations
require_once 'config/root.php';

/**
 * Fonction pour inclure un fichier de vue en vérifiant son existence.
 * @param string $file Path du fichier de vue.
 * @param string $type Type de fichier (header/footer).
 */
function includeView($file, $type)
{
    if (file_exists($file)) {
        require_once $file;
    } else {
        // Log ou message d'erreur détaillé pour la gestion des fichiers manquants
        die("Erreur : Fichier de vue {$type} manquant à l'emplacement : {$file}");
    }
}

// Exemple d'inclusion du fichier de vue (header)
includeView(VIEW_COMMUN_DIR . 'header.php', 'header');

// Le reste de votre logique (contenu principal de la page) peut être ici
echo "<h1>Bienvenue sur notre site web !</h1>";

//TESSTE




includeView(VIEW_UTILISATEUR_DIR . 'form_connexion_utilisateur.php', 'afficherImageHotels'); //! a faire!



echo "<p>Ceci est le contenu principal de la page d'accueil.</p>";

// Exemple d'inclusion du fichier de vue (footer)
includeView(VIEW_COMMUN_DIR . 'footer.php', 'footer');
