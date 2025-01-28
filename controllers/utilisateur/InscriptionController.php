<?php
// controllers/utilisateur/InscriptionController.php

// Inclure le modèle correspondant avec les chemins globaux
require_once MOD_UTILISATEURS_DIR . 'UserModel.php';

class InscriptionController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Gère l'inscription de l'utilisateur.
     */
    public function register()
    {
        // Vérifie si le formulaire a été soumis via POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupère les données du formulaire
            $nom = $_POST['userNom'] ?? '';
            $prenom = $_POST['userPrenom'] ?? '';
            $email = $_POST['userEmail'] ?? '';
            $password = $_POST['userPassword'] ?? '';
            $pays = $_POST['userPays'] ?? '';
            $ville = $_POST['userVille'] ?? '';
            $rue = $_POST['userRue'] ?? '';
            $codePostal = $_POST['userCodePost'] ?? '';
            $telephone = $_POST['userTel'] ?? '';

            // Validation des données (à ajuster selon les besoins)
            if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($pays) || empty($ville) || empty($rue) || empty($codePostal) || empty($telephone)) {
                echo "Tous les champs sont obligatoires.";
                return;
            }

            // Validation de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "L'adresse email n'est pas valide.";
                return;
            }

            // Validation du téléphone (exemple simple)
            if (!preg_match('/^[0-9]{10}$/', $telephone)) {
                echo "Le numéro de téléphone doit comporter 10 chiffres.";
                return;
            }

            // Validation du mot de passe (exemple de complexité)
            if (strlen($password) < 6) {
                echo "Le mot de passe doit comporter au moins 6 caractères.";
                return;
            }

            try {
                // Appel au modèle pour enregistrer l'utilisateur
                $result = $this->userModel->registerUser($nom, $prenom, $email, $password, $pays, $ville, $rue, $codePostal, $telephone);

                // Rediriger vers la page de confirmation après inscription réussie
                header("Location: " . BASE_URL . "login.php");
                exit;
            } catch (Exception $e) {
                echo $e->getMessage(); // Affichage du message d'erreur
            }
        }
    }
}
