<?php

/**
 * create_table_hotels.php
 *
 * Ce fichier crée une table `hotels` et une table `chambres` dans la base de données `hotel_booking`.
 * Assurez-vous que le fichier de connexion est correctement configuré.
 *
 * @package Phptest2024
 * @version 1.0.0
 */

// Inclure le fichier de connexion
require_once 'connectionBaseDonnees.php';

try {
    // Requête SQL pour créer la table hotels
    $sqlHotels = "CREATE TABLE IF NOT EXISTS hotels (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nomHotel VARCHAR(150) NOT NULL,
        paysHotel VARCHAR(100) NOT NULL,
        villeHotel VARCHAR(100) NOT NULL,
        rueHotel VARCHAR(150) NOT NULL,
        codePostHotel VARCHAR(20) NOT NULL,
        emailHotel VARCHAR(150) NOT NULL UNIQUE,
        telHotel VARCHAR(20) NOT NULL,
        nombreChamHotel INT NOT NULL,
        photoHotel VARCHAR(255) DEFAULT NULL,
        descriptionHotel TEXT DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Exécuter la requête pour la table hotels
    $pdo->exec($sqlHotels);

    echo "La table `hotels` a été créée avec succès.<br>\n";

    // Requête SQL pour créer la table chambres
    $sqlChambres = "CREATE TABLE IF NOT EXISTS chambres (
        id INT AUTO_INCREMENT PRIMARY KEY,
        hotelId INT NOT NULL,
        numChambreHotel VARCHAR(50) NOT NULL,
        photoChambre VARCHAR(255) DEFAULT NULL,
        descriptionChambre TEXT DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (hotelId) REFERENCES hotels(id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Exécuter la requête pour la table chambres
    $pdo->exec($sqlChambres);

    echo "La table `chambres` a été créée avec succès.<br>\n";

    // Insertion de données d'exemple dans la table hotels
    $sqlTestInsertHotel = "INSERT INTO hotels (nomHotel, paysHotel, villeHotel, rueHotel, codePostHotel, emailHotel, telHotel, nombreChamHotel)
                      VALUES ('Hôtel Exemple', 'France', 'Paris', 'Champs-Élysées', '75008', 'contact@exemple.fr', '0123456789', 15)";
    $pdo->exec($sqlTestInsertHotel);
    echo "Données d'exemple ajoutées à la table `hotels`.<br>\n";

    // Insertion de données d'exemple dans la table chambres
    $sqlTestInsertChambre = "INSERT INTO chambres (hotelId, numChambreHotel, photoChambre, descriptionChambre)
                            VALUES (1, '101', 'photo101.jpg', 'Chambre de luxe avec vue sur la Tour Eiffel')";
    $pdo->exec($sqlTestInsertChambre);
    echo "Données d'exemple ajoutées à la table `chambres`.<br>\n";
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur lors de la création des tables : " . $e->getMessage();
    error_log("Erreur SQL : " . $e->getMessage());
}
