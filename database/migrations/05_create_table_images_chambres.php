<?php

/**
 * 06_create_table_images_chambre.php
 *
 * Ce fichier crée une table images_chambre dans la base de données hotel_booking.
 * Assurez-vous que le fichier de connexion est correctement configuré.
 *
 * @package Phptest2024
 * @version 1.0.0
 */

// Inclure le fichier de connexion
require_once '../config/database.php';

try {
    // Requête SQL pour créer la table images_chambre
    $sql = "CREATE TABLE IF NOT EXISTS images_chambre (
        id INT AUTO_INCREMENT PRIMARY KEY,
        imageChambre VARCHAR(255) NOT NULL,
        idChambre INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (idChambre) REFERENCES chambres(id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Exécuter la requête pour créer la table
    $pdo->exec($sql);

    echo "La table `images_chambre` a été créée avec succès.<br>";
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur lors de la création de la table images_chambre : " . $e->getMessage();
    error_log("Erreur SQL : " . $e->getMessage());
}
