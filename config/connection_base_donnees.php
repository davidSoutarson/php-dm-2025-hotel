<?php
// config/connection_base_donnees.php

/**
 * Classe de gestion de la connexion à la base de données.
 * Utilise les constantes définies dans config.php pour établir la connexion.
 * 
 *  @package php-dm-2025-hotel
 *  @version 1.0.0
 */

require_once 'config.php';

class Database
{
    private static $connection;

    /**
     * Établit une connexion à la base de données si elle n'existe pas déjà.
     * Utilise les constantes définies dans config.php.
     *
     * @return PDO
     */
    public static function getConnection()
    {
        if (self::$connection === null) {
            try {
                // DSN (Data Source Name)
                $dsn = "mysql:host=" . HOST . ";dbname=" . BD_NAME . ";charset=" . CHARSET;

                // Options pour PDO
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];

                // Création de l'instance PDO
                self::$connection = new PDO($dsn, USER, PASSWORD, $options);
            } catch (PDOException $e) {
                // Gestion des erreurs de connexion en fonction du mode debug
                if (defined('DEBUG_MODE') && DEBUG_MODE) {
                    die("Erreur de connexion à la base de données : " . $e->getMessage());
                } else {
                    error_log("Erreur de connexion à la base de données : " . $e->getMessage());
                    die("Erreur interne de la base de données.");
                }
            }
        }

        return self::$connection;
    }
}
