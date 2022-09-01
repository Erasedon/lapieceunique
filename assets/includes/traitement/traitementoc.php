<?php 

include '../../db/connectdb.php'; 
if(isset( $_POST['nomfo']) && isset( $_POST['prenomfo']) && isset( $_POST['datefo']) && isset( $_POST['mailfo']) && isset( $_POST['adressefo']) && isset( $_POST['cpfo']) && isset( $_POST['villefo']) && isset( $_POST['barretxtfo']) && isset( $_POST['cifo']) && isset( $_POST['prixachat']) && isset( $_POST['quantité']) ){
    $nomfo = htmlspecialchars( $_POST['nomfo']); 
    $prenomfo =  htmlspecialchars($_POST['prenomfo']); 
    $datefo =  htmlspecialchars($_POST['datefo']);
    $mailfo =  htmlspecialchars($_POST['mailfo']);  
    $adressefo =  htmlspecialchars($_POST['adressefo']);
    $cpfo =  htmlspecialchars($_POST['cpfo']);
    $villefo =  htmlspecialchars($_POST['villefo']);
    $barretxtfo =  htmlspecialchars($_POST['barretxtfo']);
    $cifo =  htmlspecialchars($_POST['cifo']);
    $prixachat =  htmlspecialchars($_POST['prixachat']);
   $quantité =  htmlspecialchars($_POST['quantité']); 
    
    

    $sql = "SELECT * FROM occasion WHERE nom_occasion = :nom_occasion and prenom_occasion = :prenom_occasion and date_occasion = :date_occasion and  amail_occasion = :mail_occasion and  cp_occasion = :cp_occasion and  ville_occasion = :ville_occasion and cb_occasion = :cb_occasion and ci_occasion = :ci_occasion and  prix_occasion = :prix_occasion";
    $prepare = $db->prepare($sql);   
    $prepare ->execute(array(':nom_occasion' => $nomfo, ':prenom_occasion' => $prenomfo, ':date_occasion' => $datefo, ':mail_occasion' => $mailfo,  ':cp_occasion' => $cpfo,  ':ville_occasion' => $villefo, ':cb_occasion'=>$barretxtfo,':ci_occasion' => $cifo, ':prix_occasion' => $prixachat ));    
    $count = $prepare->rowCount();
      
    if ( $count == 1) {
      while($result = $prepare->fetch()) {
        // if($nomap == $result['nom_articles']){
        //   header("Location:../../../ajoutposter.php?id=erreurexist");
        // }
        echo"test1";
      }
    }
    if($count == 0){
      echo"test0"; 
        // $sql = "INSERT INTO occasion ( nom_occasion, prenom_occasion, amail_occasion, cp_occasion, ville_occasion, quantité_occasion, cb_occasion, ci_occasion) VALUES (:nom_occasion, :prenom_occasion, :prixap ,:imageap ,:cbp_articles ,:date_articles )"; 
          
        // $prepare = $db->prepare($sql);   
        // $prepare ->execute(array(':nom_articles'=>$nomap, ':descriptionap' => $descriptionap, ':prixap' => $Prixap ,':imageap' => $photopap, ':cbp_articles' => $barretxtap ,':date_articles' => $dateap ));

        //     header("Location:../poster.php?id_article= ".$result['id_articles']."");
        }
      
    
    
}