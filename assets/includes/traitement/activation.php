<?php  
    include "connexion.php";

    $vieToken = 60; // Validité du token en minutes

    if(isset($_GET['C'])){ 
        $token=$_GET['C']; 
        $sql = "SELECT * FROM users WHERE token_users = :token_users";
        $prepare = $db->prepare($sql);   
        $prepare ->execute(array(':token_users' => $token));    
        $count = $prepare->rowCount();

        if ( $count == 1) {  

            $dateToken = new \DateTime(hex2bin(substr(hex2bin($token), 26)));
            $now = new \DateTime('now');
            $interval = $dateToken->diff($now)->format('%i');
            // die(var_dump($interval->format('%i')));

            if($interval > $vieToken)
                die('T\'es trop lent boloss');

            $sql = "UPDATE users SET activation_users= :activation_users WHERE token_users = :token_users";
            $prepare = $db->prepare($sql);   
            $prepare ->execute(array(':token_users' => $token,
                ':activation_users' => "1"));
              header("Location:../../connecter.php");
            }else{ 
                header("Location:../../identifier.php?id=falseT");
            }



    }



?>