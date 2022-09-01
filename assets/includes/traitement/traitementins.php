<?php

       include '../../db/connectdb.php';



if(isset( $_POST['mail']) && isset( $_POST['mdp']) && isset( $_POST['prenom'])&& isset( $_POST['nom'])&& isset( $_POST['daten'])&& isset( $_POST['pays'])&& isset( $_POST['rue'])&& isset( $_POST['cp'])&& isset( $_POST['ville']) ){
  $prenom = htmlspecialchars($_POST['prenom']);
  $nom = htmlspecialchars($_POST['nom']); 
  $mail =  htmlspecialchars($_POST['mail']); 
  $mdp =  htmlspecialchars($_POST['mdp']);
  $daten = htmlspecialchars($_POST['daten']);
  $pays = htmlspecialchars($_POST['pays']);
  $rue = htmlspecialchars($_POST['rue']);
  $cp = htmlspecialchars($_POST['cp']);
  $ville = htmlspecialchars($_POST['ville']);


  $sql = "SELECT * FROM utilisateurs WHERE mail_utilisateurs = :mail_utilisateurs";
  $prepare = $db->prepare($sql);   
  $prepare ->execute(array(':mail_utilisateurs' => $mail));    
  $count = $prepare->rowCount();

  if ( $count == 1) {
    while($result = $prepare->fetch()) {
      if($mail == $result['mail_utilisateurs']){
        header("Location:../../../inscription.php?id=erreurexist");
      }
    }
  }
        
  if($count == 0){  
    //genere le token.
    $now = new \DateTime('now');
    $token = openssl_random_pseudo_bytes(26) . bin2hex($now->format('Y-m-d H:i:s'));
    // $token = openssl_random_pseudo_bytes(26);
    
    //Convert the binary data into hexadecimal representation.
    $token = bin2hex($token);
             
    // Plusieurs destinataires
    $to  = $mail; // notez la virgule
   
    // Sujet
    $subject = 'Metropolis etape de validation ';
  
   // message
    $message = "
    <html>
      <head>
      <title>Bienvenu dans l'entreprise Lapieceunique</title>
      </head>
      <body>
      <H1> Bonjour $nom</H1>
      <H2>Vous etes bien inscrit dans la gestionnaire de l'entreprise lapieceunique</H2>
      <p> la dernier étape est de valider le compte </p>
      <p><a href='https://divbody.com/lapieceunique/assets/includes/activation.php?C=$token'> cliquer ici </a></p>
      </body>
    </html>
    ";

    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = 'From: "G.LAPIECEUNIQUE" <yanis.pirlet@gmail.com> ';
    // En-têtes additionnels
  
    
    
    $mdp = password_hash( $mdp, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO utilisateurs (prenom_utilisateurs , nom_utilisateurs , password_utilisateurs ,  mail_utilisateurs , datenaissance_utilisateurs , rue_utilisateurs , ville_utilisateurs, cp_utilisateurs , pays_utilisateurs , token_utilisateurs , id_roles, activation_utilisateurs ) VALUES (:prenom_utilisateurs , :nom_utilisateurs , :password_utilisateurs ,  :mail_utilisateurs , :datenaissance_utilisateurs , :rue_utilisateurs , :ville_utilisateurs, :cp_utilisateurs , :pays_utilisateurs , :token_utilisateurs , :id_roles, :activation_utilisateurs )"; 
    $prepare = $db->prepare($sql);   
    $prepare ->execute(array(':prenom_utilisateurs'=>$prenom, ':nom_utilisateurs' =>$nom, ':password_utilisateurs' => $mdp, ':mail_utilisateurs' => $mail, ':datenaissance_utilisateurs'=> $daten, ':rue_utilisateurs' => $rue, ':ville_utilisateurs' => $ville, ':cp_utilisateurs' => $cp, ':pays_utilisateurs' => $pays, ':token_utilisateurs' => $token, ':id_roles' => '1', ':activation_utilisateurs' => '0' ));
    
    mail($to, $subject, $message, implode("\r\n", $headers));
        header("Location: ../../../connexion.php?id=succesinscrit");
  }
} else {
  header("location: ../../../inscription.php?id=erreurm");
}
