<?php
// Inclure le fichier de configuration pour accéder aux constantes de connexion
require_once 'config/config.php';

/**
 * creat_database.php
 * 
 * Ce fichier permet de créer la base de données si elle n'existe pas.
 * 
 * @var PDO $pdo L'instance PDO pour la connexion à la base de données.
 * @var string $dsn La chaîne de connexion pour la base de données.
 * @var string $sql La requête SQL pour créer la base de données.
 */

try {
    /**
     * Création de la chaîne de connexion pour se connecter au serveur MySQL sans spécifier de base de données.
     * Cette chaîne de connexion est utilisée pour se connecter au serveur, mais pas à une base spécifique,
     * car nous allons créer cette base avec ce script.
     * 
     * @var string $dsn
     */
    $dsn = 'mysql:host=' . HOST . ';charset=' . CHARSET;

    /**
     * Création de l'objet PDO pour se connecter au serveur MySQL.
     * L'objet PDO représente une connexion à la base de données MySQL.
     * Nous passons les paramètres de connexion à l'instanciation de l'objet.
     * 
     * @var PDO $pdo
     */
    $pdo = new PDO($dsn, USER, PASSWORD);

    // Définir le mode d'erreur PDO à exception pour mieux gérer les erreurs
    // Cela permet de s'assurer que toute erreur générée par la connexion ou l'exécution d'une requête soit capturée
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * Création de la requête SQL pour créer la base de données si elle n'existe pas déjà.
     * Nous spécifions le jeu de caractères à utiliser (utf8mb4) pour la base de données.
     * 
     * @var string $sql
     */
    $sql = "CREATE DATABASE IF NOT EXISTS " . BD_NAME . " CHARACTER SET " . CHARSET . " COLLATE utf8mb4_unicode_ci";

    // Exécution de la requête pour créer la base de données
    $pdo->exec($sql);

    // Si la base de données est créée avec succès, nous affichons un message
    echo "<p> Base de données '" . BD_NAME . "' créée avec succès !  echo L50 </p>";
} catch (PDOException $e) {
    /**
     * Si une exception se produit lors de la création de la base de données,
     * cette section capture l'erreur et affiche un message d'erreur.
     * 
     * @var PDOException $e
     */
    echo "Erreur lors de la création de la base de données : " . $e->getMessage();
}
