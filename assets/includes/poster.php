<div class="container art">
<?php
    include 'assets/db/connectdb.php'; 
$id_articles = $_GET["id_article"];

if ((empty($_GET['id_article'])))
{
    echo "Produit en rupture de stock";
}
else {

$sqll = "SELECT COUNT(*) as nombre FROM articles
WHERE id_articles = ". $_GET["id_article"] . "";
$requetee = $db->prepare($sqll);
$requetee->execute();
$affichee = $requetee->fetch();

$sqls = "SELECT * FROM articles
WHERE id_articles = ". $_GET["id_article"] . "";
$requetes = $db->prepare($sqls);
$requetes->execute();
$affiches = $requetes->fetch();

if ($affichee['nombre'] == 0)
{
    echo "Produit en rupture de stock";
}
else {
   
$sqlarticle = "SELECT * FROM articles a,images i, categories c, sous_categories sc, genres g
WHERE a.id_categories=c.id_categories 
AND a.id_sous_categories=sc.id_sous_categories
AND a.id_genres=g.id_genres
AND a.id_articles=i.id_articles
and a.id_articles = ". $_GET["id_article"] . "";
$requetearticle = $db->prepare($sqlarticle);
$requetearticle->execute();
$affichearticle = $requetearticle->fetch();
?>
  <div class="affichermess"></div>

  <div class="container_article">
      
      <div class="article">
          
          <div class="photogauche">
              <div class="photo" onclick="choixPhoto(0)" id="photo1">
                <img src="<?php echo $affichearticle['url_images']; ?>"
                alt="<?php echo $affichearticle['nom_images']; ?>"></div>
                
                 <div class="photo" onclick="choixPhoto(1)" id="photo2">
                    <img src="<?php echo $affichearticle['url_images']; ?>"
                alt="<?php echo $affichearticle['nom_images']; ?>"></div>
                    
                <div class="photo" onclick="choixPhoto(2)" id="photo3">
                      <img src="<?php echo $affichearticle['url_images']; ?>"
                alt="<?php echo $affichearticle['nom_images']; ?>"></div>
                </div>
                
                <div id="afficher2"></div>
                
                <div class="photoarticle">
                    
                    <div class="photo2 active" id="photo0">
                        <img id="image1" src="<?php echo $affichearticle['url_images']; ?>"
                        alt="<?php echo $affichearticle['nom_images']; ?>"></div>
                        <div class="photo2" id="photo22">
                             <img src="<?php echo $affichearticle['url_images']; ?>"
                                alt="<?php echo $affichearticle['nom_images']; ?>"></div>
                            <div class="photo2" id="photo33">
                                 <img src="<?php echo $affichearticle['url_images']; ?>"
                                     alt="<?php echo $affichearticle['nom_images']; ?>"></div>
                            </div>
                            
                            <div class="detailarticle">
                                
                        


<div class="favorisb"></div>

<form method="POST" class="formulaire">        
    <div class="detail1 ">
        <div class="titre2"><?php echo $affichearticle['nom_articles']; ?> </div>
        <div class="titre2 favorisa">
     

</div>
</div>
<form method="POST" class="formpanier">
    <div class="detail1">
        <div class="titre2">Taille : </div>
        
        <div class="titre2" id="afficher">
        <div class="titre2"><?php echo $affichearticle['hauteur_articles']; ?> €</div>
        <div class="titre2"><?php echo $affichearticle['largeur_articles']; ?> €</div>

</div>
</div>
<div class="detail1">
    <div class="titre2">Prix : </div>
    <div class="titre2"><?php echo $affichearticle['prix_articles']; ?> €</div>
</div>
<div class="detail1">
    <div class="titre2">Quantite : </div>
    <div class="titre2 afficher"></div>
    <div class="titre2"><?php echo $affiches['quantite_articles']; ?></div>



</div>

<div class="detail2">
    <div class="titre3">Description de l'article :</div>
    <div class="titre4"></div>
    <div class="titre2"><?php echo $affichearticle['description_articles']; ?></div>
</div>



<!-- bouton achat  -->
<div class="placementbout">
<input type="hidden"  name="retour">
    <button type="submit" class="boutonajoutpanier">
        <a style="text-decoration: none" href="index.php" ><i class='fa-solid fa-bag-shopping'></i> Retour </a>
    </button>
                    </form>

<input type="hidden"  name="modifier">
    <button type="submit" class="boutonajoutpanier">
        <a style="text-decoration: none" href="ajoutposter.php?id_article=<?php echo $id_articles;?>" ><i class='fa-solid fa-bag-shopping'></i> Modifier </a>
    </button>
                  
</div>
<!-- 
<div class="inforetour">
    <i class="fa-solid fa-check"></i> Tout nos articles sont fabriqués en France<br>
    <i class="fa-solid fa-check"></i> 30 jours pour changer d'avis<br>
    <i class="fa-solid fa-check"></i> Retour gratuit<br>
    <i class="fa-solid fa-check"></i> Livraison offerte<br>
</div> -->



</div>


</div><!-- fin article -->


<br><br><br><br>

<?php
}
}
?>
</div> <!-- fin container -->
</div>