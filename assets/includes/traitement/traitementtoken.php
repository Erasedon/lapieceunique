<?php  
       include '../../db/connectdb.php';

    $vieToken = 60; // Validité du token en minutes

    if(isset($_GET['reset'])){ 
        $token=$_GET['reset']; 
        $sql = "SELECT * FROM utilisateurs WHERE token_mdp_utilisateurs = :token_mdp_utilisateurs";
        $prepare = $db->prepare($sql);   
        $prepare ->execute(array(':token_mdp_utilisateurs' => $token));    
        $count = $prepare->rowCount();

        if ( $count == 1) {  

            $dateToken = new \DateTime(hex2bin(substr(hex2bin($token), 26)));
            $now = new \DateTime('now');
            $interval = $dateToken->diff($now)->format('%i');
            // die(var_dump($interval->format('%i')));

            if($interval > $vieToken){
                header("Location:../../..connexion.php?id=tokeninvalide");
            }else{ 
                header("Location:../../../changementmdp.php?reset=$token");
            }

        }

    }



?>
