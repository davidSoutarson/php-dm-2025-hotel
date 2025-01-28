<?php

/**
 * creationTableEntreprise.php
 *
 * Ce fichier crée une table `entreprise` dans la base de données `hotel_booking`.
 * Assurez-vous que le fichier de connexion est correctement configuré.
 *
 * @package Phptest2024
 * @version 1.0.0
 */

// Inclure le fichier de connexion
require_once 'connectionBaseDonnees.php';

try {
    // Requête SQL pour créer la table entreprise
    $sql = "CREATE TABLE IF NOT EXISTS entreprise (
        id INT AUTO_INCREMENT PRIMARY KEY,
        entrepriseNom VARCHAR(150) NOT NULL,
        entreprisePays VARCHAR(100) NOT NULL,
        entrepriseVille VARCHAR(100) NOT NULL,
        entrepriseEmail VARCHAR(150) NOT NULL UNIQUE,
        entrepriseTel VARCHAR(20) NOT NULL,
        entreprisePassword VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Exécuter la requête
    $pdo->exec($sql);

    echo "La table `entreprise` a été créée avec succès.";
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur lors de la création de la table : " . $e->getMessage();
    error_log("Erreur SQL : " . $e->getMessage());
}
