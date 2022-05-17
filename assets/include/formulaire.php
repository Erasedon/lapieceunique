<div class="container">
    <div class="inscription">
        <h3>Formulaire d'occasion :</h3>

        <div class="error"></div>

        <form method="post" action="assets/includes/db/traitementins.php" id="formajax">
            <div class="model_un">
                <div class="nom">
                    <label for="">Nom :</label>
                    <input type="text" name="nom" required>
                </div>

                <div class="prenom">
                    <label for="">Prénom :</label>
                    <input type="text" name="prenom" required>
                </div>
            </div>
            <div class="model_deux">
                <label for="">Date de naissance :</label>
                <input type="date" name="daten" required>
            </div>

            <div class="model_deux">
                <label for="">Adresse mail :</label>
                <input type="text" name="mail" required>
            </div>
            
            
            <div class="model_deux">
                <label for="">Pays :</label>
                <input type="text" name="pays" required>
            </div>
            
            <div class="model_deux">
                <label for="">Adresse :</label>
                <input type="text" name="rue" required>
            </div>
            
            <div class="model_un">
                <div class="nom">
                    <label for="">Code postal :</label>
                    <input type="text" name="cp" required>
                </div>
                
                <div class="prenom">
                    <label for="">Ville :</label>
                    <input type="text" name="ville" required>
                </div>
            </div>
            <div class="model_un">
                <div class="nom">
                    <label for="">Code barre photo :</label>
                      <input type="file" name="cbp" required>
                </div>
                <div class="prenom">
                    <label for="">Code barre :</label>
                    <input type="text" name="barretxt" required>
                </div>  
            </div>
                
            <div class="model_deux">
                <label for="">Carte d'identité :</label>
                <input type="file" name="ci" required>
            </div>
          
            <div class="model_deux">
                <label for=""></label>
            
            </div>
            <input type="submit" class="sub" value="Enregistrer">
        </form>
    </div>
</div>