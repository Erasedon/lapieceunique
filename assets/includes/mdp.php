<div class="container">
    <div class="connexion">
        <h3>Changement de Mot de Passe :</h3>
    
        <form method="post" action="assets/includes/traitement/traitementmdp.php?reset=<?php echo $_GET["reset"]; ?>">
        <label for="" class="titr_la">Mot de passe :</label>
            <input type="text" name="mdp" class="titr_in">

            <label for="" class="titr_la">Confirmation du Mot de passe :</label>
            <input type="text" name="mdp2" class="titr_in">

            <input type="submit" class="sub" value="Valider">
        </form>
    </div>
</div>