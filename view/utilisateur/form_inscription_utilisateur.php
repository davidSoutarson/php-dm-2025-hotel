<?php
// view/utilisateur/inscription.php
require_once CONFIG_DIR . "root.php";
require_once VIEW_COMMUN_DIR . "header.php";
?>

<h1 class="titre-contenue">Inscription</h1>
<form action="<?= BASE_URL ?>controllers/utilisateur/InscriptionController.php" method="POST" class="formulair">
    <h2 class="titre-formulair">S'inscrire comme utilisateur</h2>

    <p>
        <label for="userNom">Nom</label>
        <input type="text" name="userNom" id="userNom" required>
    </p>

    <p>
        <label for="userPrenom">Prénom</label>
        <input type="text" name="userPrenom" id="userPrenom" required>
    </p>

    <p>
        <label for="userPays">Pays</label>
        <input type="text" name="userPays" id="userPays" required>
    </p>

    <p>
        <label for="userVille">Ville</label>
        <input type="text" name="userVille" id="userVille" required>
    </p>

    <p>
        <label for="userRue">Rue</label>
        <input type="text" name="userRue" id="userRue" required>
    </p>

    <p>
        <label for="userCodePost">Code postal</label>
        <input type="number" name="userCodePost" id="userCodePost" required>
    </p>

    <p>
        <label for="userEmail">Adresse email</label>
        <input type="email" name="userEmail" id="userEmail" required>
    </p>

    <p>
        <label for="userTel">Numéro de téléphone</label>
        <input type="tel" name="userTel" id="userTel" required pattern="[0-9]{10}">
    </p>

    <p>
        <label for="userPassword">Créer votre mot de passe</label>
        <input type="password" name="userPassword" id="userPassword" required minlength="6">
    </p>

    <!-- Affichage des messages d'erreur si nécessaires -->
    <p>
        <span style="color:red;">
            <?php
            // Exemple d'affichage d'erreurs côté formulaire
            if (isset($error_message)) {
                echo $error_message;
            }
            ?>
        </span>
    </p>

    <p>
        <button type="submit" name="register">Enregistrer le client</button>
    </p>
</form>