<?php

/**
 * 05_create_table_images_hotels.php
 *
 * Ce fichier crée une table images_hotels dans la base de données hotel_booking.
 * Assurez-vous que le fichier de connexion est correctement configuré.
 *
 * @package Phptest2024
 * @version 1.0.0
 */

// Inclure le fichier de connexion
require_once '../config/database.php';

try {
    // Requête SQL pour créer la table images_hotels
    $sql = "CREATE TABLE IF NOT EXISTS images_hotels (
        id INT AUTO_INCREMENT PRIMARY KEY,
        imageHotel VARCHAR(255) NOT NULL,
        idHotel INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (idHotel) REFERENCES hotels(id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Exécuter la requête pour créer la table
    $pdo->exec($sql);

    echo "La table `images_hotels` a été créée avec succès.<br>";
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur lors de la création de la table images_hotels : " . $e->getMessage();
    error_log("Erreur SQL : " . $e->getMessage());
}
