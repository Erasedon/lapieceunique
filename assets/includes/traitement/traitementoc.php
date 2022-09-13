<?php 

include '../../db/connectdb.php';
session_start();
if(isset( $_POST['nomfo']) && isset( $_POST['prenomfo']) && isset( $_POST['datefo']) && isset( $_POST['mailfo']) && isset( $_POST['adressefo']) && isset( $_POST['cpfo']) && isset( $_POST['villefo']) && isset( $_POST['barretxtap'])&& isset( $_POST['prixachat']) && isset( $_POST['quantité']) ){
    $nomfo = htmlspecialchars( $_POST['nomfo']); 
    $prenomfo =  htmlspecialchars($_POST['prenomfo']); 
    $datefo =  htmlspecialchars($_POST['datefo']);
    $mailfo =  htmlspecialchars($_POST['mailfo']);  
    $adressefo =  htmlspecialchars($_POST['adressefo']);
    $cpfo =  htmlspecialchars($_POST['cpfo']);
    $villefo =  htmlspecialchars($_POST['villefo']);
    $barretxtap =  htmlspecialchars($_POST['barretxtap']);
    $prixachat =  htmlspecialchars($_POST['prixachat']);
   $quantité =  htmlspecialchars($_POST['quantité']); 
   $nomap = htmlspecialchars( $_POST['nomap']); 
   $descriptionap =  htmlspecialchars($_POST['Descriptionap']);

    $sql = "SELECT * FROM occasion WHERE nom_occasion = :nom_occasion and prenom_occasion = :prenom_occasion and date_occasion = :date_occasion and  amail_occasion = :mail_occasion and  cp_occasion = :cp_occasion and  ville_occasion = :ville_occasion and cbp_occasion = :cbp_occasion";
    $prepare = $db->prepare($sql);   
    $prepare ->execute(array(':nom_occasion' => $nomfo, ':prenom_occasion' => $prenomfo, ':date_occasion' => $datefo, ':mail_occasion' => $mailfo,  ':cp_occasion' => $cpfo,  ':ville_occasion' => $villefo, ':cbp_occasion'=>$barretxtap));    
    $count = $prepare->rowCount();
      
    if ( $count == 1) {
      while($result = $prepare->fetch()) {
        if($nomfo == $result['nom_occasion']){
          header("Location:../../../occasion.php?id=erreurexist");
        }
      }
    }
    if($count == 0){
    
      $tmpName = $_FILES['file']['tmp_name'];
      $name = $_FILES['file']['name'];
      $size = $_FILES['file']['size'];
      $error = $_FILES['file']['error'];
   
      $tabExtension = explode('.', $name);
      $extension = strtolower(end($tabExtension));
   
      $extensions = ['jpg', 'png', 'jpeg', 'gif'];
      $maxSize = 400000;
   
      if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
   
          $uniqueName = uniqid('', true);
          //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
          $file = $uniqueName.".".$extension;
          //$file = 5f586bf96dcd38.73540086.jpg
         
          move_uploaded_file($tmpName, '../../uploads/'.$file);
      
      
      $sql = "INSERT INTO occasion (nom_occasion, prenom_occasion, amail_occasion,ville_occasion ,cp_occasion ,cbp_occasion ,date_occasion,ci_occasion,id_utilisateurs ) VALUES (:nom_occasion, :prenom_occasion, :mail_occasion,:ville_occasion ,:cp_occasion ,:cbp_occasion ,:date_occasion,:ci_occasion,:id_utilisateurs )"; 
      $prepare = $db->prepare($sql);   
      $prepare ->execute(array(':nom_occasion' => $nomfo, ':prenom_occasion' => $prenomfo, ':date_occasion' => $datefo, ':mail_occasion' => $mailfo,  ':cp_occasion' => $cpfo,  ':ville_occasion' => $villefo, ':cbp_occasion'=>$barretxtap,':ci_occasion'=>$file ,':id_utilisateurs'=>$_SESSION['nid']));
      }
      $sql = "SELECT * FROM occasion WHERE nom_occasion = :nom_occasion and prenom_occasion = :prenom_occasion and date_occasion = :date_occasion and  amail_occasion = :mail_occasion and  cp_occasion = :cp_occasion and  ville_occasion = :ville_occasion and cbp_occasion = :cbp_occasion";
      $prepare = $db->prepare($sql);   
      $prepare ->execute(array(':nom_occasion' => $nomfo, ':prenom_occasion' => $prenomfo, ':date_occasion' => $datefo, ':mail_occasion' => $mailfo,  ':cp_occasion' => $cpfo,  ':ville_occasion' => $villefo, ':cbp_occasion'=>$barretxtap));    
      $count = $prepare->rowCount();
        
      if($count == 1){
        while($result = $prepare->fetch()) {
          if($nomfo == $result['nom_occasion']){
        $sql = "INSERT INTO articles (nom_articles , description_articles , prix_articles ,cbp_articles ,id_occasion) VALUES (:nom_articles ,:descriptionap ,:prixap ,:cbp_articles ,:id_occasion)"; 
        $prepare = $db->prepare($sql);   
        $prepare ->execute(array(':nom_articles'=>$nomap, ':descriptionap' => $descriptionap, ':prixap' => $prixachat ,':cbp_articles' => $barretxtap ,':id_occasion'=>$result['id_occasion']));
        header("Location:../../../occasion.php?id_occasion=".$result['id_occasion'].""); 
      }
        }
      }else{
        
        header("Location:../../../occasion.php?id=erreurexistpas");
      }

      // $sql = "INSERT INTO images (nom_images,url_images, id_articles) VALUES (:nom_images, :url_images,:id_articles )"; 
      // $prepare = $db->prepare($sql);   
      //         $prepare ->execute(array(':nom_images'=>$name, ':url_images' => $chemin,':id_articles' => $result['id_articles'] ));


        //     header("Location:../poster.php?id_article= ".$result['id_articles']."");
        }
      
    
    
}