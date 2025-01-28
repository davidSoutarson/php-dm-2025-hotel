<?php
// fichier config.php

/**
 * Ce fichier permet de gérer la connexion à la base de données.
 * Les paramètres de connexion sont définis ici et peuvent être inclus dans
 * d'autres fichiers pour y accéder facilement.
 * 
 * @package Phptest2024
 * @version 1.0.0
 * 
 * Vous devez inclure ce fichier dans votre code où une connexion à la base de données est nécessaire.
 * Exemple d'utilisation :
 *  - Inclure ce fichier et utiliser les constantes définies pour créer une connexion PDO.
 */

// Définition des constantes pour la connexion à la base de données
define('HOST', 'localhost');  // L'adresse de l'hôte (serveur de base de données)
define('USER', 'root');       // Nom d'utilisateur pour se connecter à la base de données
define('PASSWORD', '');       // Mot de passe pour se connecter à la base de données
define('BD_NAME', 'hotel_booking');  // Nom de la base de données à laquelle se connecter
define('CHARSET', 'utf8mb4'); // Jeu de caractères à utiliser pour la connexion à la base de données
