<?php 

       include '../../db/connectdb.php';



  if(isset( $_POST['mail'])){   
    $mail =  htmlspecialchars($_POST['mail']); 
    $sql = "SELECT * FROM utilisateurs WHERE mail_utilisateurs = :mail_utilisateurs";
    $prepare = $db->prepare($sql);   
    $prepare ->execute(array(':mail_utilisateurs' => $mail));    
    $count = $prepare->rowCount();

    if ( $count == 1) {
        //genere le token.
        $now = new \DateTime('now');
        $token = openssl_random_pseudo_bytes(26) . bin2hex($now->format('Y-m-d H:i:s'));
        // $token = openssl_random_pseudo_bytes(26);
        
        //Convert the binary data into hexadecimal representation.
        $token = bin2hex($token);
        
      // Plusieurs destinataires
      $to  = $mail ; // notez la virgule
      
      // Sujet
      $subject = 'Ecommerce Réinitialiser votre Mot de passe ';
      
      // message
      $message = "
      <html>
      <head>
      <title>Ecommerce</title>
      </head>
      <body>
      <H1>Voici l\' étape pour réinitialiser votre Mot de passe</H1>
      <p><a href='https://yanis.simplon-charleville.fr/ecommerce/assets/includes/db/traitementtoken.php?reset=$token'> cliquer ici </a></p>
      </body>
      </html>
      ";
      
      // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-type: text/html; charset=iso-8859-1';
      $headers[] = 'From: "Metropolis Simplon" <yanis.pirlet@gmail.com> ';
      // En-têtes additionnels
      
      
      mail($to, $subject, $message, implode("\r\n", $headers));
       
        $sql = "UPDATE utilisateurs SET token_mdp_utilisateurs = :token_mdp_utilisateurs WHERE mail_utilisateurs= :mail_utilisateurs";
        $prepare = $db->prepare($sql);   
        $prepare ->execute(array(':mail_utilisateurs' => $mail,
            ':token_mdp_utilisateurs' => $token));
            header("Location:../../../connexion.php?id=demm");
       
    }else{  
           header("Location:../../../verificationmail.php?id=erreurexist");
    }
    
}

// // Envoi
// $success = mail($to, $subject, $message, implode("\r\n", $headers));
// if (!$success) {
    //     $errorMessage = error_get_last()['message'];
    //     die("Erreur envoi mail : " . $errorMessage);
    // }

?>
