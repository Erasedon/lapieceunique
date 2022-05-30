<div class="container">
    <div class="inscription">
        <h3>Formulaire d'occasion :</h3>

        <div class="error"></div>

        <form method="post" action="assets/include/traitement/traitementoc.php" id="formajax">
            <div class="model_un">
                <div class="nom">
                    <label for="">Nom :</label>
                    <input type="text" name="nomfo" required>
                </div>

                <div class="prenom">
                    <label for="">Prénom :</label>
                    <input type="text" name="prenomfo" required>
                </div>
            </div>
            <div class="model_deux">
                <label for="">Date de naissance :</label>
                <input type="date" name="datefo" required>
            </div>

            <div class="model_deux">
                <label for="">Adresse mail :</label>
                <input type="text" name="mailfo" required>
            </div>
            
            
            <div class="model_deux">
                <label for="">Pays :</label>
                <input type="text" name="paysfo" required>
            </div>
            
            <div class="model_deux">
                <label for="">Adresse :</label>
                <input type="text" name="adressefo" required>
            </div>
            
            <div class="model_un">
                <div class="nom">
                    <label for="">Code postal :</label>
                    <input type="text" name="cpfo" required>
                </div>
                
                <div class="prenom">
                    <label for="">Ville :</label>
                    <input type="text" name="villefo" required>
                </div>
            </div>
            <div class="model_un">
                <div class="nom">
                    <label for="">Code barre photo :</label>
                      <input type="file" name="cbpfo" required>
                </div>
                <div class="prenom">
                    <label for="">Code barre :</label>
                    <input type="text" name="barretxtfo" required>
                </div>  
            </div>
                
            <div class="model_deux">
                <label for="">Carte d'identité :</label>
                <input type="file" name="cifo" required>
            </div>
          
            <div class="model_deux">
                <label for=""></label>
            
            </div>
            <input type="submit" class="sub" value="Enregistrer">
        </form>
    </div>
</div>