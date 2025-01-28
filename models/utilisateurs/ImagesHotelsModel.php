<?php
// models/utilisateurs/ImagesHotelsModel.php

require_once 'config/connection_base_donnees.php';

class ImagesHotelsModel
{
    private $db;

    public function __construct()
    {
        // Obtient la connexion à la base de données via la classe Database
        $this->db = Database::getConnection();
    }

    /**
     * Récupère toutes les images des hôtels
     * Associe les images aux hôtels par l'ID de l'hôtel
     *
     * @return array
     */
    public function getAllImages()
    {
        try {
            // Requête SQL pour récupérer toutes les images des hôtels
            $query = "SELECT hotel_id, image_url FROM images_hotels";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            // Récupérer toutes les images sous forme de tableau associatif
            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Organiser les images par hotel_id
            $imagesByHotel = [];
            foreach ($images as $image) {
                $imagesByHotel[$image['hotel_id']] = $image;
            }

            return $imagesByHotel;
        } catch (PDOException $e) {
            // Gérer les erreurs de connexion ou d'exécution de la requête
            if (defined('DEBUG_MODE') && DEBUG_MODE) {
                die("Erreur lors de la récupération des images des hôtels : " . $e->getMessage());
            } else {
                error_log("Erreur lors de la récupération des images des hôtels : " . $e->getMessage());
                return [];
            }
        }
    }

    /**
     * Récupère une image spécifique pour un hôtel par ID
     *
     * @param int $hotelId
     * @return array
     */
    public function getImageByHotelId($hotelId)
    {
        try {
            // Requête SQL pour récupérer l'image spécifique d'un hôtel
            $query = "SELECT image_url FROM images_hotels WHERE hotel_id = :hotel_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':hotel_id', $hotelId, PDO::PARAM_INT);
            $stmt->execute();

            // Récupérer l'image sous forme de tableau associatif
            $image = $stmt->fetch(PDO::FETCH_ASSOC);

            return $image ? $image['image_url'] : 'images/default.jpg';
        } catch (PDOException $e) {
            // Gérer les erreurs de connexion ou d'exécution de la requête
            if (defined('DEBUG_MODE') && DEBUG_MODE) {
                die("Erreur lors de la récupération de l'image de l'hôtel : " . $e->getMessage());
            } else {
                error_log("Erreur lors de la récupération de l'image de l'hôtel : " . $e->getMessage());
                return 'images/default.jpg'; // Retourne une image par défaut en cas d'erreur
            }
        }
    }
}
