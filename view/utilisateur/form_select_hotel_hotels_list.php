<?php
// form_select_hotel_hotels_list.php
require_once 'config/root.php';
require_once 'config/connection_base_donnees.php';
require_once 'models/utilisateurs/HotelsModel.php';
require_once 'models/utilisateurs/ImagesHotelsModel.php';
require_once 'controllers/SelectHotelsController.php';

// Contrôleur pour récupérer les données
$controller = new SelectHotelsController();
$hotelsByCountryAndCity = $controller->getHotelsByCountryAndCity();
?>

<!DOCTYPE html>
<html lang="<?php echo DEFAULT_LANGUAGE; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL . 'css/style.css?ver=' . time(); ?>">
    <title>Liste des Hôtels</title>
</head>

<body>
    <div id="wrape">
        <header>
            <?php include 'view/commun/header.php'; ?>
        </header>

        <main>
            <h1>Sélectionnez un Hôtel</h1>
            <div class="hotel-list">
                <?php foreach ($hotelsByCountryAndCity as $country => $cities): ?>
                    <h2><?php echo htmlspecialchars($country); ?></h2>
                    <?php foreach ($cities as $city => $hotels): ?>
                        <h3><?php echo htmlspecialchars($city); ?></h3>
                        <div class="city-hotels">
                            <?php foreach ($hotels as $hotel): ?>
                                <div class="hotel-card">
                                    <img src="<?php echo BASE_URL . htmlspecialchars($hotel['image_url']); ?>" alt="Photo de <?php echo htmlspecialchars($hotel['name']); ?>">
                                    <div class="hotel-info">
                                        <h4><?php echo htmlspecialchars($hotel['name']); ?></h4>
                                        <p><?php echo htmlspecialchars($hotel['description']); ?></p>
                                        <a href="view/utilisateur/form_reservation.php?hotel_id=<?php echo $hotel['id']; ?>" class="reserve-btn">Réserver</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</body>

</html>