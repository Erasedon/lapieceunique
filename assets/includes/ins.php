<div class="container">
    <div class="inscription">
        <h3>Inscription :</h3>

        <form method="post" action="assets/includes/traitement/traitementins.php">
            <div class="model_un">
                <div class="nom">
                    <label for="">Nom :</label>
                    <input type="text" name="nom">
                </div>

                <div class="prenom">
                    <label for="">Prénom :</label>
                    <input type="text" name="prenom">
                </div>
            </div>

          

            <div class="model_deux">
                <label for="">Date de naissance :</label>
                <input type="date" name="daten">
            </div>

            <div class="model_deux">
                <label for="">Adresse mail :</label>
                <input type="text" name="mail">
            </div>

            <div class="model_deux">
                <label for="">Mot de passe :</label>
                <input type="text"name="mdp">
            </div>

            <div class="model_deux">
                <label for="">Confirmation du mot de passe :</label>
                <input type="text" name="mdp2">
            </div>

            <div class="model_deux">
                <label for="">Pays :</label>
                <input type="text" name="pays">
            </div>

            <div class="model_deux">
                <label for="">Adresse :</label>
                <input type="text" name="rue">
            </div>

            <div class="model_un">
                <div class="nom">
                    <label for="">Code postal :</label>
                    <input type="text" name="cp">
                </div>

                <div class="prenom">
                    <label for="">Ville :</label>
                    <input type="text" name="ville">
                </div>
            </div>

            <div class="conditions">
                <input type="checkbox">
                <p>En cochant la case, vous acceptez de vous conformer à la <a href="" class="confident">Politique de confidentialité</a> et aux <a href="" class="confident">Conditions générales</a>.</p>
            </div>

            <input type="submit" class="sub" value="S'inscrire">
        </form>

        <div class="co_ins">
            <p>Déjà inscrit ?</p>
            <a href="connexion.php" class="mdp_oublie">Connecte toi !</a>
        </div>
    </div>
</div>