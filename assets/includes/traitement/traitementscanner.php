<?php

include '../../db/connectdb.php'; 
    $cbpfo = $_POST['cb'];

       $sql = "SELECT * FROM articles WHERE cbp_articles = :cbp_articles";
       $prepare = $db->prepare($sql);   
       $prepare ->execute(array(':cbp_articles' => $cbpfo));    
       $count = $prepare->rowCount();

       if ($count == 1) {
         while($result = $prepare->fetch()) {
           if($cbpfo == $result['cbp_articles']){
             header("Location:../../../poster.php?id_article= ".$result['id_articles']."");
           }
         }
       }
       if ($count == 0) {
  
            header("Location:../../../scanner.php?ernotr");
          
      }


?>
