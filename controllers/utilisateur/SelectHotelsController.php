<?php
// controllers/SelectHotelsController.php

require_once 'models/utilisateurs/HotelsModel.php';
require_once 'models/utilisateurs/ImagesHotelsModel.php';

class SelectHotelsController
{
    private $hotelsModel;
    private $imagesHotelsModel;

    public function __construct()
    {
        $this->hotelsModel = new HotelsModel();
        $this->imagesHotelsModel = new ImagesHotelsModel(); //teste
    }

    /**
     * Récupère les hôtels classés par pays et ville
     *
     * @return array
     */
    public function getHotelsByCountryAndCity()
    {
        $hotels = $this->hotelsModel->getAllHotels();
        $images = $this->imagesHotelsModel->getAllImages();

        $hotelsByCountryAndCity = [];

        foreach ($hotels as $hotel) {
            $country = $hotel['country'];
            $city = $hotel['city'];
            $hotelId = $hotel['id'];

            // Associer l'image principale au bon hôtel
            $hotel['image_url'] = isset($images[$hotelId]) ? $images[$hotelId]['image_url'] : 'images/default.jpg';

            if (!isset($hotelsByCountryAndCity[$country])) {
                $hotelsByCountryAndCity[$country] = [];
            }

            if (!isset($hotelsByCountryAndCity[$country][$city])) {
                $hotelsByCountryAndCity[$country][$city] = [];
            }

            $hotelsByCountryAndCity[$country][$city][] = $hotel;
        }

        return $hotelsByCountryAndCity;
    }
}
