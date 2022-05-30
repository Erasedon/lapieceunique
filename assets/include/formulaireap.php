<div class="container">
    <div class="inscription">
        <h3> D'ajout de poster  :</h3>

        <div class="error"></div>

        <form method="post" action="assets/include/traitement/traitementajout.php" id="formajax">
            <div class="model_deux">
                    <label for="">Nom du Produit:</label>
                    <input type="text" name="nomap" required>
            
            </div>
            <div class="model_deux">
                <label for="">Date du produits :</label>
                <input type="date" name="dateap" required>
            </div>

            <div class="model_deux">
                <label for="">Taille :</label>
                <input type="text" name="tailleap" required>
            </div>
               <div class="model_deux">
                <label for="">Prix :</label>
                <input type="text" name="Prixap" required>
            </div>
            <div class="model_deux">
                <label for="">Description  :</label>
                <input type="text" name="Descriptionap" required>
            </div>
            
            <div class="model_un">
                <div class="nom">
                    <label for="">Code barre  :</label>
                      <input type="file" name="cbpap" required>
                </div>
                <div class="prenom">
                    <label for="">Code barre :</label>
                    <input type="text" name="barretxtap" required>
                </div>  
            </div>
        
          
            <div class="model_deux">
                <label for=""></label>
            
            </div>
            <input type="submit" class="sub" value="Enregistrer">
        </form>
    </div>
</div>