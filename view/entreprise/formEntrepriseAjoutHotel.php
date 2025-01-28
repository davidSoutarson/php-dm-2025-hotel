<h1 class="titre-contenu">Vous permet d'ajouter les hôtels et leurs chambres</h1>

<!-- Formulaire simplifié pour ajouter un hôtel -->
<form method="post" action="" class="formulair">
    <h2 class="titre-formulair">Ajouter un hôtel</h2>

    <!-- Nom de l'hôtel (obligatoire) -->
    <p>
        <label for="nomHotel">Nom de l'hôtel</label>
        <input type="text" name="nomHotel" id="nomHotel" required>
    </p>

    <!-- Adresse : Pays, Ville, Rue, et Code postal -->
    <h3>Adresse</h3>
    <p>
        <label for="paysHotel">Pays</label>
        <input type="text" name="paysHotel" id="paysHotel" required>

        <label for="villeHotel">Ville</label>
        <input type="text" name="villeHotel" id="villeHotel" required>
    </p>
    <p>
        <label for="rueHotel">Rue</label>
        <input type="text" name="rueHotel" id="rueHotel" required>

        <label for="codePostHotel">Code postal</label>
        <input type="number" name="codePostHotel" id="codePostHotel" required>
    </p>

    <!-- Contact : Email et Téléphone (obligatoires) -->
    <h3>Contact</h3>
    <p>
        <label for="emailHotel">Adresse email</label>
        <input type="email" name="emailHotel" id="emailHotel" required>
    </p>
    <p>
        <label for="telHotel">Numéro de téléphone</label>
        <input type="tel" name="telHotel" id="telHotel" required>
    </p>

    <!-- Nombre de chambres (obligatoire) -->
    <h3>Description</h3>
    <p>
        <label for="nombreChamHotel">Nombre de chambres</label>
        <input type="number" name="nombreChamHotel" id="nombreChamHotel" required>
    </p>

    <!-- Photo et Description (facultatifs) -->
    <p>
        <label for="photoHotel">Photo de l'hôtel (facultatif)</label>
        <input type="file" name="photoHotel" id="photoHotel" accept="image/*">
    </p>
    <p>
        <label for="descriptionHotel">Description (facultatif)</label>
        <textarea name="descriptionHotel" id="descriptionHotel" rows="4" placeholder="Ajoutez une description si nécessaire..."></textarea>
    </p>

    <!-- Bouton d'envoi -->
    <p>
        <input type="submit" value="Enregistrer l'hôtel" id="enregHotel">
    </p>
</form>


<!-- Formulaire HTML pour ajouter des chambres à l'hôtel 
 Formulaire simplifié pour ajouter des chambres -->
<form action="" method="post" class="formulair">
    <h2 class="titre-formulair">Ajouter des chambres à votre hôtel</h2>

    <h3>Informations sur les chambres</h3>

    <!-- Numéro de chambre (obligatoire) -->
    <p>
        Mon de l hotel ? (provient de la table create_table_hotels ).
    </p>

    <p>
        <label for="numChambreHotel">Numéro de chambre</label>
        <input type="number" name="numChambreHotel" id="numChambreHotel" required>
    </p>

    <!-- Photo de chambre (facultative) -->
    <p>
        <label for="photoChambre">Photo de la chambre (facultatif)</label>
        <input type="file" name="photoChambre" id="photoChambre" accept="image/*">
    </p>

    <!-- Description de la chambre (facultative) -->
    <p>
        <label for="descriptionChambre">Description (facultatif)</label>
        <textarea name="descriptionChambre" id="descriptionChambre" rows="4" placeholder="Ajoutez une description si nécessaire..."></textarea>
    </p>

    <!-- Bouton d'envoi -->
    <p>
        <input type="submit" value="Enregistrer la chambre" id="eregChambreHotel">
    </p>
</form>