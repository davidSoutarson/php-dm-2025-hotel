<?php
// models/utilisateurs/UserModel.php

// Utilisation du chemin configuré pour l'inclusion
require_once CONFIG_DIR . 'connection_base_donnees.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Vérifie si un email existe déjà dans la base de données.
     * 
     * @param string $email
     * @return bool
     */
    public function emailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM utilisateurs WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    /**
     * Enregistre un nouvel utilisateur dans la base de données.
     * 
     * @param string $nom
     * @param string $prenom
     * @param string $email
     * @param string $password
     * @param string $pays
     * @param string $ville
     * @param string $rue
     * @param string $codePostal
     * @param string $telephone
     * @return bool
     */
    public function registerUser($nom, $prenom, $email, $password, $pays, $ville, $rue, $codePostal, $telephone)
    {
        if ($this->emailExists($email)) {
            throw new Exception('L\'email existe déjà.');
        }

        // Hacher le mot de passe avant de l'enregistrer
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Requête pour insérer l'utilisateur dans la base de données
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, pays, ville, rue, code_postal, telephone) 
                VALUES (:nom, :prenom, :email, :mot_de_passe, :pays, :ville, :rue, :code_postal, :telephone)";

        // Préparation de la requête
        $stmt = $this->db->prepare($sql);

        // Lier les paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', $hashedPassword);
        $stmt->bindParam(':pays', $pays);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':rue', $rue);
        $stmt->bindParam(':code_postal', $codePostal);
        $stmt->bindParam(':telephone', $telephone);

        // Exécution de la requête et vérification
        if (!$stmt->execute()) {
            throw new Exception('Erreur lors de l\'inscription.');
        }

        return true;
    }
}
