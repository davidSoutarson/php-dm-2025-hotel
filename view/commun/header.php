<?php
// Inclure le fichier root.php qui contient les constantes globales et les configurations
require_once 'config/root.php';
session_start(); // Démarrer la session pour gérer l'état de l'utilisateur
?>
<!DOCTYPE html>
<html lang="<?php echo DEFAULT_LANGUAGE; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS principal -->
    <link rel="stylesheet" href="<?php echo BASE_URL . 'css/style.css?ver=' . time(); ?>">

    <title><?php echo SITE_NAME; ?></title>
</head>

<body>
    <div id="wrape">
        <header>
            <div class="bando">
                <h1 class="titre-projet">
                    <a href="<?php echo BASE_URL; ?>index.php" class="blanc">Presque Booking</a>
                </h1>

                <div class="aDroit">
                    <p class="devise blanc survol">EUR</p>

                    <div class="patileDrapeau">
                        <div class="flagBandBleu"></div>
                        <div class="flagBandBlanc"></div>
                        <div class="flagBandRed"></div>
                    </div>

                    <!-- Affichage conditionnel selon l'état de l'utilisateur -->
                    <?php if (isset($_SESSION['user'])): ?>
                        <p class="survol">Bienvenue, <?php echo $_SESSION['user']['nom']; ?></p>
                        <a href="<?php echo BASE_URL; ?>view/utilisateur/deconnexion.php" class="iteme fBlanc bleu">Se déconnecter</a>
                    <?php else: ?>
                        <a href="<?php echo BASE_URL; ?>view/utilisateur/form_inscription_utilisateur.php" class="iteme fBlanc bleu">S'inscrire</a>
                        <a href="<?php echo BASE_URL; ?>view/utilisateur/form_connexion_utilisateur.php" class="iteme fBlanc bleu">Se connecter</a>
                    <?php endif; ?>
                </div>
            </div>

            <nav class="menu-principale">
                <ul class="liste-menu">
                    <li class="liste-iteme">
                        <a href="<?php echo BASE_URL; ?>index.php" class="iteme blanc">Accueil</a>
                    </li>
                    <li class="liste-iteme">
                        <a href="<?php echo BASE_URL; ?>view/formSeletHotel.php" class="iteme blanc">Choisir votre Hôtel</a>
                    </li>
                    <li class="liste-iteme">
                        <a href="<?php echo BASE_URL; ?>view/formReservation.php" class="iteme blanc">Date de Réservation</a>
                    </li>
                    <li class="liste-iteme">
                        <a href="<?php echo BASE_URL; ?>view/veauReservation.php" class="iteme blanc">Voir Réservations</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
</body>

</html>