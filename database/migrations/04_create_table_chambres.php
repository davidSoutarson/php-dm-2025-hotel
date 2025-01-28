<?php

/**
 * 06_create_table_chambres.php
 *
 * Ce fichier crée une table chambres dans la base de données hotel_booking.
 * Assurez-vous que le fichier de connexion est correctement configuré.
 *
 * @package Phptest2024
 * @version 1.0.0
 */

// Inclure le fichier de connexion
require_once '../config/database.php';

try {
    // Requête SQL pour créer la table chambres
    $sql = "CREATE TABLE IF NOT EXISTS chambres (
        id INT AUTO_INCREMENT PRIMARY KEY,
        hotelId INT NOT NULL,
        numChambreHotel VARCHAR(50) NOT NULL,
        photoChambre VARCHAR(255) DEFAULT NULL,
        descriptionChambre TEXT DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (hotelId) REFERENCES hotels(id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Exécuter la requête pour créer la table
    $pdo->exec($sql);

    echo "La table `chambres` a été créée avec succès.<br>";
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur lors de la création de la table chambres : " . $e->getMessage();
    error_log("Erreur SQL : " . $e->getMessage());
}
