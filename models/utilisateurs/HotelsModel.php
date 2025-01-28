<?php
// models/utilisateurs/HotelsModel.php

require_once 'config/connection_base_donnees.php';

class HotelsModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Récupère tous les hôtels depuis la base de données
     *
     * @return array
     */
    public function getAllHotels()
    {
        $query = "SELECT id, name, description, city, country FROM hotels ORDER BY country, city, name";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un hôtel spécifique par ID
     *
     * @param int $id
     * @return array|null
     */
    public function getHotelById($id)
    {
        $query = "SELECT id, name, description, city, country FROM hotels WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Ajoute un nouvel hôtel à la base de données
     *
     * @param array $hotelData
     * @return bool
     */
    public function addHotel($hotelData)
    {
        $query = "INSERT INTO hotels (name, description, city, country) VALUES (:name, :description, :city, :country)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $hotelData['name']);
        $stmt->bindParam(':description', $hotelData['description']);
        $stmt->bindParam(':city', $hotelData['city']);
        $stmt->bindParam(':country', $hotelData['country']);

        return $stmt->execute();
    }

    /**
     * Supprime un hôtel par ID
     *
     * @param int $id
     * @return bool
     */
    public function deleteHotel($id)
    {
        $query = "DELETE FROM hotels WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Met à jour un hôtel par ID
     *
     * @param int $id
     * @param array $hotelData
     * @return bool
     */
    public function updateHotel($id, $hotelData)
    {
        $query = "UPDATE hotels SET name = :name, description = :description, city = :city, country = :country WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $hotelData['name']);
        $stmt->bindParam(':description', $hotelData['description']);
        $stmt->bindParam(':city', $hotelData['city']);
        $stmt->bindParam(':country', $hotelData['country']);

        return $stmt->execute();
    }
}
