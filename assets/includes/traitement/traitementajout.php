<?php 
include '../../db/connectdb.php'; 

if(isset( $_POST['nomap']) && isset( $_POST['Prixap'])&& isset( $_POST['hauteurap'])&& isset( $_POST['largeurap']) && isset( $_POST['Descriptionap']) && isset( $_POST['barretxtap']) && isset( $_POST['Quantite'])){
    $nomap = htmlspecialchars( $_POST['nomap']); 
    $Prixap =  htmlspecialchars($_POST['Prixap']);
    $Quantite =  htmlspecialchars($_POST['Quantite']);
    $hauteurap =  htmlspecialchars($_POST['hauteurap']);
    $largeurap =  htmlspecialchars($_POST['largeurap']);
    $selgenres =  htmlspecialchars($_POST['selgenres']);
    $selcat =  htmlspecialchars($_POST['selcat']);
    $selsouscat =  htmlspecialchars($_POST['selsouscat']);
    $descriptionap =  htmlspecialchars($_POST['Descriptionap']);
    $barretxtap =  htmlspecialchars($_POST['barretxtap']);
    // $photopap =  htmlspecialchars($_POST['image']);
    
    
    

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
        $sql = "INSERT INTO articles (nom_articles, description_articles, prix_articles, cbp_articles, quantite_articles, hauteur_articles, largeur_articles, id_categories, id_genres, id_sous_categories, id_occasion) VALUES (:nom_articles, :description_articles, :prixap, :cbp_articles, :quantite_articles, :hauteur_articles, :largeur_articles, :id_categories, :id_genres, :id_sous_categories, :id_occasion)"; 
        $prepare = $db->prepare($sql);   
        $prepare ->execute(array(':nom_articles'=>$nomap, ':description_articles' => $descriptionap, ':prixap' => $Prixap ,':cbp_articles' => $barretxtap ,':quantite_articles'=>$Quantite,':hauteur_articles'=>$hauteurap ,':largeur_articles'=>$largeurap ,':id_categories'=>$selcat ,':id_sous_categories'=>$selsouscat ,':id_genres'=>$selgenres,':id_occasion'=>0));


        $sql = "SELECT * FROM articles WHERE nom_articles = :nom_articles";
        $prepare = $db->prepare($sql);   
        $prepare ->execute(array(':nom_articles' => $nomap));    
        $count = $prepare->rowCount();

    if ( $count == 1) {
      while($result = $prepare->fetch()) {
        if($nomap == $result['nom_articles']){
          if(isset($_FILES['file'])){
                  
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
                $sql = "INSERT INTO images (nom_images,url_images, id_articles) VALUES (:nom_images, :url_images,:id_articles)"; 
                $prepare = $db->prepare($sql);   
                        $prepare ->execute(array(':nom_images'=>$name, ':url_images' => $file,':id_articles' => $result['id_articles'] ));
                                   
                header("Location:../../../poster.php?id_article= ".$result['id_articles']."");
              }
            }
  
        }
      }
    }
    }
}