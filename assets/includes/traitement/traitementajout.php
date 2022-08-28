<?php 
include 'assets/db/connectdb.php'; 

if(isset( $_POST['nomap']) && isset( $_POST['dateap']) && isset( $_POST['image']) && isset( $_POST['Prixap']) && isset( $_POST['Descriptionap']) && isset( $_POST['barretxtap']) && isset( $_POST['quantité'])){
    $nomap = htmlspecialchars( $_POST['nomap']); 
    $dateap =  htmlspecialchars($_POST['dateap']); 
    $Prixap =  htmlspecialchars($_POST['Prixap']);
    $cbpap =  htmlspecialchars($_POST['cbpap']);
    $hauteur =  htmlspecialchars($_POST['hauteur']);
    $largueurap =  htmlspecialchars($_POST['largueur']);
    $descriptionap =  htmlspecialchars($_POST['Descriptionap']);
    $barretxtap =  htmlspecialchars($_POST['barretxtap']);
    $photopap =  htmlspecialchars($_POST['image']);
    
    
    

    $sql = "SELECT * FROM articles WHERE nom_articles = :nom_articles";
    $prepare = $db->prepare($sql);   
    $prepare ->execute(array(':nom_articles' => $nomap));    
    $count = $prepare->rowCount();

    if ( $count == 1) {
      while($result = $prepare->fetch()) {
        if($nomap == $result['nom_articles']){
          
          header("Location:../../../ajoutposter.php?id=erreurexist");
        }
      }
    }
    if($count == 0){ 
        $sql = "INSERT INTO articles ( nom_articles , description_articles , prix_articles , image1_articles , cbp_articles , date_articles ) VALUES (:nom_articles, :descriptionap, :prixap ,:imageap ,:cbp_articles ,:date_articles )"; 
          
        $prepare = $db->prepare($sql);   
        $prepare ->execute(array(':nom_articles'=>$nomap, ':descriptionap' => $descriptionap, ':prixap' => $Prixap ,':imageap' => $photopap, ':cbp_articles' => $barretxtap ,':date_articles' => $dateap ));


        $sql = "SELECT * FROM articles WHERE nom_articles = :nom_articles";
    $prepare = $db->prepare($sql);   
    $prepare ->execute(array(':nom_articles' => $nomap));    
    $count = $prepare->rowCount();

    if ( $count == 1) {
      while($result = $prepare->fetch()) {
        if($nomap == $result['nom_articles']){
          header("Location:../poster.php?id_article= ".$result['id_articles']."");
        }
      }
    }
    }
}