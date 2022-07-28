<?php 
    include 'assets/db/connectdb.php'; 

if ((!empty($_GET['id_article'])))
{
    $sql = "SELECT * FROM articles WHERE id_articles = :id_articles";
    $prepare = $db->prepare($sql);   
    $prepare ->execute(array(':id_articles' => $_GET['id_article']));
    $result = $prepare->fetch();

    $sql1 = "SELECT * FROM stocks WHERE id_articles = :id_articles";
    $prepare1 = $db->prepare($sql1);   
    $prepare1 ->execute(array(':id_articles' => $_GET['id_article']));
    $result1 = $prepare1->fetch();
?>

<div class="container">
    <div class="inscription">
        <h3> D'ajout de poster  :</h3>

        <div class="error"></div>

        <form method="post" action="assets/include/traitement/traitementmod.php" id="formajax">
            <div class="model_deux">
                    <label for="">Nom du Produit:</label>
                    <input type="text" name="nomap" value="<?php echo $result['nom_articles'] ?>" required>
            
            </div>
            <div class="model_deux">
                <label for="">Date du produits :</label>
                <input type="date" name="dateap" value="<?php echo $result['date_articles'] ?>" required>
            </div>

            <div class="model_deux">
                <label for="">Hauteur :</label>
                <input type="text" name="hauteurap" value="<?php echo $result['hauteur_articles'] ?>" required>
            </div>
            
            <div class="model_deux">
                <label for="">Largeur :</label>
                <input type="text" name="largeurap" value="<?php echo $result['largeur_articles'] ?>" required>
            </div>
               <div class="model_deux">
                <label for="">Prix :</label>
                <input type="text" name="Prixap" value="<?php echo $result['prix_articles'] ?>" required>
            </div>
            <div class="model_deux">
                <label for="">Description  :</label>
                <input type="text" name="Descriptionap"  value="<?php echo $result['description_articles'] ?>"required>
            </div>
            <div class="model_deux">
                <label for="">Quantité :</label>
                <input type="text" name="Quantité" value="<?php echo $result['quantite_stock'] ?>" required>
            </div>
            <div class="model_un">
                <!-- <div class="nom">
                    <label for="">Code barre  :</label>
                      <input type="file" name="cbpap" required>
                </div> -->
                <div class="prenom">
                    <label for="">Code barre :</label>
                    <input type="text" name="barretxtap" value="<?php echo $result['cbp_articles'] ?>" required>
                </div>  
            </div>
        
          
            <div class="model_deux">
                <label for=""></label>
            
            </div>
            <input type="submit" class="sub" value="Enregistrer">
            <button type="submit" class="sub">
                    <a style="text-decoration: none" href="poster.php?id_article=<?php echo $result['id_articles'] ?>" ><i class='fa-solid fa-bag-shopping'></i> Retour </a>
                 </button>
        </form>
    </div>
</div>
<?php
}else{

?>
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
                <label for="">Hauteur :</label>
                <input type="text" name="hauteurap"  required>
            </div>
            <div class="model_deux">
                <label for="">Largeur :</label>
                <input type="text" name="largeurap"  required>
            </div>
               <div class="model_deux">
                <label for="">Prix :</label>
                <input type="text" name="Prixap" required>
            </div>
            <div class="model_deux">
                <label for="">Description  :</label>
                <input type="text" name="Descriptionap" required>
            </div>
            <div class="model_deux">
                <label for="">Quantité :</label>
                <input type="text" name="Quantité" required>
            </div>
           <div class="model_un">
                <!-- <div class="nom">
                    <label for="">Code barre  :</label>
                      <input type="file" name="cbpap" required>
                </div> --> 
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

<?php } ?>