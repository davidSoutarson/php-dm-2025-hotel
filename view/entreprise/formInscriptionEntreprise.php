<h1 class="titre-contenu">Formulaire d'inscription d'une entreprise</h1>

<!-- Formulaire pour créer un compte entreprise -->
<form action="" class="formulair" method="post">
    <h2 class="titre-formulair">Créer un compte entreprise</h2>

    <p class="formDescrption">
        Remplissez ce formulaire pour créer un compte entreprise. Une fois inscrit, vous pourrez ajouter et gérer vos hôtels.
    </p>

    <!-- Informations de l'entreprise -->
    <h3>Informations de l'entreprise</h3>
    <p>
        <label for="entrepriseNom">Nom de l'entreprise</label>
        <input type="text" name="entrepriseNom" id="entrepriseNom" placeholder="Nom de l'entreprise" required autocomplete="off">
    </p>
    <p>
        <label for="entreprisePays">Pays</label>
        <input type="text" name="entreprisePays" id="entreprisePays" placeholder="Pays" required autocomplete="off">
    </p>
    <p>
        <label for="entrepriseVille">Ville</label>
        <input type="text" name="entrepriseVille" id="entrepriseVille" placeholder="Ville" required autocomplete="off">
    </p>

    <!-- Contact -->
    <h3>Contact</h3>
    <p>
        <label for="entrepriseEmail">Adresse email de contact</label>
        <input type="email" name="entrepriseEmail" id="entrepriseEmail" placeholder="exemple@email.com" required autocomplete="email">
    </p>
    <p>
        <label for="entrepriseTel">Numéro de téléphone</label>
        <input type="tel" name="entrepriseTel" id="entrepriseTel" placeholder="+33 6 12 34 56 78" pattern="[+][0-9]{2} [0-9]{1,2} [0-9]{2} [0-9]{2} [0-9]{2}" required autocomplete="tel">
    </p>

    <!-- Mot de passe -->
    <h3>Sécurité</h3>
    <p>
        <label for="entreprisePassword">Mot de passe</label>
        <input type="password" name="entreprisePassword" id="entreprisePassword" placeholder="Mot de passe" required autocomplete="new-password">
    </p>
    <p>
        <label for="confirmPassword">Confirmez votre mot de passe</label>
        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirmez votre mot de passe" required autocomplete="new-password">
    </p>

    <!-- Bouton d'envoi -->
    <p>
        <input type="submit" value="S'enregistrer">
    </p>
</form>