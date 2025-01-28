<?php

/**
 * creationTableUtilisateur.php
 *
 * Ce fichier crée une table `utilisateur` dans la base de données `hotel_booking`.
 * Assurez-vous que le fichier de connexion est correctement configuré.
 *
 * @package Phptest2024
 * @version 1.0.0
 */

// Inclure le fichier de connexion
require_once 'connectionBaseDonnees.php';

try {
    // Requête SQL pour créer la table utilisateur
    $sql = "CREATE TABLE IF NOT EXISTS utilisateur (
        id INT AUTO_INCREMENT PRIMARY KEY,
        userNom VARCHAR(100) NOT NULL,
        userPrenom VARCHAR(100) NOT NULL,
        userPays VARCHAR(100) NOT NULL,
        userVille VARCHAR(100) NOT NULL,
        userRue VARCHAR(150) NOT NULL,
        userCodePost VARCHAR(20) NOT NULL,
        userEmail VARCHAR(150) NOT NULL UNIQUE,
        userTel VARCHAR(20) NOT NULL,
        userPassword VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Exécuter la requête
    $pdo->exec($sql);

    echo "La table `utilisateur` a été créée avec succès.";
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur lors de la création de la table : " . $e->getMessage();
    error_log("Erreur SQL : " . $e->getMessage());
}
