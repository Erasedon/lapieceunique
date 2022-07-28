<?php


include 'assets/db/connectdb.php'; 

if(isset( $_POST['nomap']) && isset( $_POST['dateap']) && isset( $_POST['Prixap']) && isset( $_POST['Descriptionap']) && isset( $_POST['barretxtap']) && isset( $_POST['quantité'])){
    $nomap = htmlspecialchars( $_POST['nomap']); 
    $dateap =  htmlspecialchars($_POST['dateap']); 
    $Prixap =  htmlspecialchars($_POST['Prixap']);
    $cbpap =  htmlspecialchars($_POST['cbpap']);
    $hauteur =  htmlspecialchars($_POST['hauteur']);
    $largueurap =  htmlspecialchars($_POST['largueur']);
    $descriptionap =  htmlspecialchars($_POST['Descriptionap']);
    $barretxtap =  htmlspecialchars($_POST['barretxtap']);
    $photopap =  htmlspecialchars($_POST['image']);
    
    
    

    $sql = "SELECT * FROM articles WHERE id_articles = :id_articles";
    $prepare = $db->prepare($sql);   
    $prepare ->execute(array(':id_articles' => $_GET['id_article']));    
    $count = $prepare->rowCount();

    if ( $count == 1) {
      while($result = $prepare->fetch()) {
        // if($nomap == $result['nom_articles'] && $dateap == $result['date_articles']&& $Prixap == $result['nom_articles']&& $nomap == $result['nom_articles']&& $nomap == $result['nom_articles']&& $nomap == $result['nom_articles']&& $nomap == $result['nom_articles']){
          // $sql = "UPDATE articles SET tokenmdp_users = :tokenmdp_users WHERE email_users= :email_users";
          // $prepare = $db->prepare($sql);   
          // $prepare ->execute(array(':email_users' => $mail,
          //     ':tokenmdp_users' => $token));
          //     header("Location:../../identifier.php?id=demm");
          echo "test 1 ";
          header("Location:../../../ajoutposter.php?id=erreurmod");
        // }
      }
    }
    if($count == 0){ 
      echo "test 0";
        $sql = "UPDATE articles SET nom_articles = :nom_articles , description_articles = :description_articles , prix_articles = :prix_articles , image1_articles = :image1_articles , cbp_articles = :cbp_articles , date_articles = :date_articles  WHERE id_articles= :id_article";
        $prepare = $db->prepare($sql);   
        $prepare ->execute(array(':nom_articles' => $nomap,
            ':description_articles' => $descriptionap,
            ':prix_articles' => $Prixap,
            ':image1_articles' => $photopap,
            ':cbp_articles' => $barretxtap,
            ':date_articles' => $dateap,
            ':id_article' => $_GET['id_article']
            ));
         

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


