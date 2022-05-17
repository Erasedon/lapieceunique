
    <div class="container art">
<?php

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
                <img src="assets/img/<?php echo $affichearticle['image1_articles']; ?>"
                alt="<?php echo $affichearticle['nom_articles']; ?>"></div>
                
                <div class="photo" onclick="choixPhoto(1)" id="photo2">
                    <img src="assets/img/<?php echo $affichearticle['image2_articles']; ?>"
                    alt="<?php echo $affichearticle['nom_articles']; ?>"></div>
                    
                <div class="photo" onclick="choixPhoto(2)" id="photo3">
                    <img src="assets/img/<?php echo $affichearticle['image3_articles']; ?>"
                    alt="<?php echo $affichearticle['nom_articles']; ?>"></div>
                </div>
                
                <div id="afficher2"></div>
                
                <div class="photoarticle">
                    
                    <div class="photo2 active" id="photo0">
                        <img id="image1" src="assets/img/<?php echo $affichearticle['image1_articles']; ?>"
                        alt="<?php echo $affichearticle['nom_articles']; ?>"></div>
                        <div class="photo2" id="photo22">
                            <img src="assets/img/<?php echo $affichearticle['image2_articles']; ?>"
                            alt="<?php echo $affichearticle['nom_articles']; ?>"></div>
                            <div class="photo2" id="photo33">
                                <img src="assets/img/<?php echo $affichearticle['image3_articles']; ?>"
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
            
            <select name="tailles" id="tailles">
                <option value="">--Choisir une taille--</option>
                <?php 
                        while ($affichedetail2 = $requetedetail2->fetch())
                        {
                            ?>
                                <option value="<?php echo $affichedetail2['id_tailles'];?>">
                                    <?php echo $affichedetail2['taille_tailles'];?></option>
                                    <?php
                        }
                        ?>

</select>

<?php
                        $sqldetail3 = "SELECT c.couleur_couleurs AS couleurs, c.id_couleurs AS id, COUNT(*) AS nombres FROM articles a, stocks s, tailles t, couleurs c 
                        WHERE a.id_articles=s.id_articles 
                        AND s.id_tailles=t.id_tailles 
                        AND s.id_couleurs=c.id_couleurs 
                        AND s.id_articles = " . $_GET["id_article"] . " 
                        GROUP BY c.couleur_couleurs";
                        $requetedetail3= $db->prepare($sqldetail3);
                        $requetedetail3->execute();
                        
                        ?>

</div>
</div>
<div class="detail1">
    <div class="titre2">Prix : </div>
    <div class="titre2"><?php echo $affichearticle['prix_articles']; ?> €</div>
</div>
<div class="detail1">
    <div class="titre2">Couleur : </div>
    <div class="titre2 afficher">
        
        <select name="couleurs" id="couleurs" onchange="getPhoto(this.value);">
            <option value="">--Choisir une couleur--</option>
            <?php 
                        while ($affichedetail3 = $requetedetail3->fetch())
                        {
                            ?>
                                <option value="<?php echo $affichedetail3['id'];?>">
                                    <?php echo $affichedetail3['couleurs'];?></option>
                                    <?php
                        }
                        ?>

</select>

</div>
</div>

<div class="detail2">
    <div class="titre3">Description de l'article :</div>
    <div class="titre4"></div>
    <div class="titre2"><?php echo $affichearticle['description_articles']; ?></div>
</div>



<!-- bouton achat  -->
<div class="placementbout">
    <input type="hidden" value="1" name="quantite">
    
    <button type="submit" class="boutonajoutpanier">
        <i class='fa-solid fa-bag-shopping'></i> Ajouter au panier
    </button>
                    </form>
</div>

<div class="inforetour">
    <i class="fa-solid fa-check"></i> Tout nos articles sont fabriqués en France<br>
    <i class="fa-solid fa-check"></i> 30 jours pour changer d'avis<br>
    <i class="fa-solid fa-check"></i> Retour gratuit<br>
    <i class="fa-solid fa-check"></i> Livraison offerte<br>
</div>



</div>


</div><!-- fin article -->

<div class="commentairesarticle" id="commentaire">
    
    <?php

if (isset($_SESSION['id']))
{

$id_login = $_SESSION['id'];
if (isset($_GET["action"]))
{
    if ($_GET["action"] == 'com')
    {
        $sqldanscomms= "SELECT COUNT(*) AS nombres FROM commentaires
                WHERE id_utilisateurs = :id_utilisateur and id_articles=:id_articles";
                $requetedanscomms = $db->prepare($sqldanscomms);
                $requetedanscomms->execute(array(
                    ":id_utilisateur" => $id_login,
                    ":id_articles" => $_GET['id_article']
                ));
                $affichedanscomms = $requetedanscomms->fetch();
                
                if ($affichedanscomms['nombres'] >= 1 ) {echo "Vous avez déjà écris un commentaire<br>";}
                else {
                    
                    $heure =  date('Y-m-d H:i:s');
                    
                    $sqlajoutcommentaire = "INSERT INTO commentaires (commentaire_commentaires, date_commentaires, id_articles, id_utilisateurs) VALUES (:commentaire, :heure, :id_articles, :id_utilisateur)";
                    $requeteajoutcommentaire = $db->prepare($sqlajoutcommentaire);
                    $requeteajoutcommentaire->execute(array(
                        ":commentaire" => $_POST['commentaire'],
                        ":heure" => $heure,
                        ":id_utilisateur" => $id_login,
                        ":id_articles" => $_GET['id_article']    
                    ));
                    
                    echo "Votre commentaire est ajouté<br>";
                }
            }

            if ($_GET["action"] == 'comsuppr')
            {

                $sql = "DELETE FROM commentaires WHERE id_utilisateurs = :id_utilisateur and id_articles=:id_articles";
                $requete = $db->prepare($sql);
                $requete->execute(array(
                    ":id_utilisateur" => $id_login,
                    ":id_articles" => $_GET['id_article']
                ));

                echo "Votre commentaire est maintenant supprimé, vous pouvez en ajouter un nouveau<br><br>";
            }
        }

        
        $sqldanscomms= "SELECT COUNT(*) AS nombres FROM commentaires
        WHERE id_utilisateurs = :id_utilisateur and id_articles=:id_articles";
        $requetedanscomms = $db->prepare($sqldanscomms);
        $requetedanscomms->execute(array(
            ":id_utilisateur" => $id_login,
            ":id_articles" => $_GET['id_article']
        ));
        $affichedanscomms = $requetedanscomms->fetch();
        
        
        if ($affichedanscomms['nombres'] >= 1){
            echo "Vous avez déjà posté un commentaire vous pouvez le supprimer <a href='article.php?id_article=".$_GET['id_article']."&action=comsuppr#commentaire'><i class='fa-solid fa-trash-can'></i></a><br><br>";
        }
        if ($affichedanscomms['nombres'] <= 0 ){ 
           
          
           ?>

    <form action="article.php?id_article=<?php echo $_GET['id_article'];?>&action=com#commentaire" method="POST">
    <textarea name="commentaire" placeholder="Ecrire un commentaire" class="commentairestexte" max-lenght="255"></textarea><br>
    <input type="submit"  class="boutonajoutcommentaire" value="Poster mon commentaire">
    </form>

        <?php
        }
    }
        
        $sqlaffichecomms= "SELECT * FROM commentaires c, utilisateurs u
        WHERE  c.id_utilisateurs=u.id_utilisateurs
        AND c.id_articles=:id_articles";
        $requeteaffichecomms = $db->prepare($sqlaffichecomms);
        $requeteaffichecomms->execute(array(
            ":id_articles" => $_GET['id_article']
        ));
        while ($afficheaffichecomms = $requeteaffichecomms->fetch())
        {
            ?>
                    De : <?php echo $afficheaffichecomms['prenom_utilisateurs'];?> le <?php echo $afficheaffichecomms['date_commentaires'];?> <br>        
                    <?php echo $afficheaffichecomms['commentaire_commentaires'];?><br>
                    
                    <div class="hr-perso"></div>
                    
                    <?php
        }
        
        ?>


</div>

<br><br><br><br>

<?php
}
}
?>
</div> <!-- fin container -->
</div>