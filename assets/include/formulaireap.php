<div class="container">
    <div class="inscription">
        <h3> D'ajout de poster  :</h3>

        <div class="error"></div>

        <form method="post" action="assets/includes/db/traitementins.php" id="formajax">
            <div class="model_deux">
                    <label for="">Nom du Produit:</label>
                    <input type="text" name="nom" required>
            
            </div>
            <div class="model_deux">
                <label for="">Date du produits :</label>
                <input type="date" name="daten" required>
            </div>

            <div class="model_deux">
                <label for="">Taille :</label>
                <input type="text" name="rue" required>
            </div>
               <div class="model_deux">
                <label for="">Prix :</label>
                <input type="text" name="rue" required>
            </div>
            <div class="model_deux">
                <label for="">Description  :</label>
                <input type="text" name="rue" required>
            </div>
            
            <div class="model_un">
                <div class="nom">
                    <label for="">Code barre  :</label>
                      <input type="file" name="cbp" required>
                </div>
                <div class="prenom">
                    <label for="">Code barre :</label>
                    <input type="text" name="barretxt" required>
                </div>  
            </div>
        
          
            <div class="model_deux">
                <label for=""></label>
            
            </div>
            <input type="submit" class="sub" value="Enregistrer">
        </form>
    </div>
</div>