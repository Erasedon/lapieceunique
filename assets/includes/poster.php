
    <div class="container art">
<?php
$id_articles = $_GET["id_article"];

if ((empty($_GET['id_article'])))
{
    echo "Produit en rupture de stock";
}
else {

$sqll = "SELECT COUNT(*) as nombre FROM stocks
WHERE id_articles = " . $_GET["id_article"] . "";
$requetee = $db->prepare($sqll);
$requetee->execute();
$affichee = $requetee->fetch();

$sqls = "SELECT * FROM stocks
WHERE id_articles = " . $_GET["id_article"] . "";
$requetes = $db->prepare($sqls);
$requetes->execute();
$affiches = $requetes->fetch();

if ($affichee['nombre'] == 0)
{
    echo "Produit en rupture de stock";
}
else {
   
$sqlarticle = "SELECT * FROM articles a, categories c, sous_categories sc, genres g, marques m
WHERE a.id_categories=c.id_categories 
AND a.id_sous_categories=sc.id_sous_categories
AND a.id_genres=g.id_genres
AND a.id_marques=m.id_marques
and a.id_articles = " . $_GET["id_article"] . "";
$requetearticle = $db->prepare($sqlarticle);
$requetearticle->execute();
$affichearticle = $requetearticle->fetch();
?>
  <div class="affichermess"></div>

      
  
  <div class="container_article">
      
      <div class="article">
          
          <div class="photogauche">
              <div class="photo" onclick="choixPhoto(0)" id="photo1">
                <img src="<?php echo $affichearticle['image1_articles']; ?>"
                alt="<?php echo $affichearticle['nom_articles']; ?>"></div>
                
                <div class="photo" onclick="choixPhoto(1)" id="photo2">
                    <img src="<?php echo $affichearticle['image2_articles']; ?>"
                    alt="<?php echo $affichearticle['nom_articles']; ?>"></div>
                    
                <div class="photo" onclick="choixPhoto(2)" id="photo3">
                    <img src="<?php echo $affichearticle['image3_articles']; ?>"
                    alt="<?php echo $affichearticle['nom_articles']; ?>"></div>
                </div>
                
                <div id="afficher2"></div>
                
                <div class="photoarticle">
                    
                    <div class="photo2 active" id="photo0">
                        <img id="image1" src="<?php echo $affichearticle['image1_articles']; ?>"
                        alt="<?php echo $affichearticle['nom_articles']; ?>"></div>
                        <div class="photo2" id="photo22">
                            <img src="<?php echo $affichearticle['image2_articles']; ?>"
                            alt="<?php echo $affichearticle['nom_articles']; ?>"></div>
                            <div class="photo2" id="photo33">
                                <img src="<?php echo $affichearticle['image3_articles']; ?>"
                                alt="<?php echo $affichearticle['nom_articles']; ?>"></div>
                            </div>
                            
                            <div class="detailarticle">
                                
                                <?php


$sqldetail2 = "SELECT *  FROM tailles";
$requetedetail2= $db->prepare($sqldetail2);
$requetedetail2->execute();
       
        ?>

<div class="favorisb"></div>

<form method="POST" class="formulaire">        
    <div class="detail1 ">
        <div class="titre2"><?php echo $affichearticle['nom_articles']; ?> </div>
        <div class="titre2 favorisa">
            <?php

if (isset($_SESSION['id']))
{

$id_login = $_SESSION['id'];

    $sqlfavoris = "SELECT COUNT(*) AS nombres FROM favoris
    WHERE  id_utilisateurs = :id_utilisateur
    AND id_articles = :id_article";
    $requetefavoris = $db->prepare($sqlfavoris);
    $requetefavoris->execute(array(
        ":id_utilisateur" => $id_login,
        ":id_article" => $_GET['id_article']    
    ));
    $affichefavoris = $requetefavoris->fetch();
    
    if ($affichefavoris['nombres'] <= 0) {
        ?>
        <input type="hidden" value="1" id="favoris">
        <button type="submit">
            <i class="fa-regular fa-heart"></i>
        </button>
    </form>
    <?php
    }
    if ($affichefavoris['nombres'] >= 1) {        
        ?>
        <input type="hidden" value="1" id="favoris">
        <button type="submit">
            <i class="fa-solid fa-heart"></i>
        </button>
    </form>
    <?php
    }
}else{}
    ?>




</div>
</div>
<form method="POST" class="formpanier">
    <div class="detail1">
        <div class="titre2">Taille : </div>
        
        <div class="titre2" id="afficher">
        <div class="titre2"><?php echo $affichearticle['prix_articles']; ?> €</div>

</div>
</div>
<div class="detail1">
    <div class="titre2">Prix : </div>
    <div class="titre2"><?php echo $affichearticle['prix_articles']; ?> €</div>
</div>
<div class="detail1">
    <div class="titre2">Quantite : </div>
    <div class="titre2 afficher"></div>
    <div class="titre2"><?php echo $affiches['quantite_stock']; ?></div>



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