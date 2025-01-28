<?php

/**
 * create_table_reservations.php
 *
 * Ce fichier crée une table `reservations` dans la base de données `hotel_booking`.
 * Assurez-vous que le fichier de connexion est correctement configuré.
 *
 * @package Phptest2024
 * @version 1.0.0
 */

// Inclure le fichier de connexion
require_once 'connectionBaseDonnees.php';

try {
    // Requête SQL pour créer la table reservations
    $sqlReservations = "CREATE TABLE IF NOT EXISTS reservations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        numeroChambre VARCHAR(50) NOT NULL,
        prixChambre DECIMAL(10, 2) NOT NULL,
        dateDebueReserver DATE NOT NULL,
        dateFinReserver DATE NOT NULL,
        idHotel INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (idHotel) REFERENCES hotels(id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Exécuter la requête pour créer la table
    $pdo->exec($sqlReservations);

    echo "La table `reservations` a été créée avec succès.<br>\n";

    // Insertion de données d'exemple dans la table reservations
    $sqlTestInsertReservation = "INSERT INTO reservations (numeroChambre, prixChambre, dateDebueReserver, dateFinReserver, idHotel)
                                 VALUES ('101', 150.00, '2025-01-25', '2025-01-30', 1)";
    $pdo->exec($sqlTestInsertReservation);

    echo "Données d'exemple ajoutées à la table `reservations`.<br>\n";
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur lors de la création de la table : " . $e->getMessage();
    error_log("Erreur SQL : " . $e->getMessage());
}
