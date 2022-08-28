<?php
       include '../../db/connectdb.php';
    
    if(isset($_GET['reset'])){ 
        $token=$_GET['reset']; 
        if(isset( $_POST['mdp'])){
            $mdp =  htmlspecialchars($_POST['mdp']);
                $mdp = password_hash( $mdp, PASSWORD_DEFAULT);

                $sql = "UPDATE utilisateurs SET password_utilisateurs= :mdp_users WHERE token_mdp_utilisateurs = :tokenmdp_users";
                        $prepare = $db->prepare($sql);   
                        $prepare ->execute(array(':mdp_users' => $mdp,
                            ':tokenmdp_users' => $token));    
                
                    
                $rech = "SELECT * FROM utilisateurs WHERE token_mdp_utilisateurs = :tokenmdp_users";
                $prepare1 = $db->prepare($rech);
                $prepare1 ->execute(array(':tokenmdp_users' => $token));
                $result = $prepare1->fetch();
                //genere le token.
                    $now = new \DateTime('now');
                    $token = openssl_random_pseudo_bytes(26) . bin2hex($now->format('Y-m-d H:i:s'));
                    // $token = openssl_random_pseudo_bytes(26);
                    
                    //Convert the binary data into hexadecimal representation.
                    $token = bin2hex($token);
                            
                    // Plusieurs destinataires
                    $to  = $result['mail_utilisateurs']; // notez la virgule
                    // Sujet
                    $subject = 'Metropolis etape de validation ';
                
                // message
                    $message = '
                   
                    <!doctype html>
                    <html>
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    </head>
                    <body style="font-family: sans-serif;">
                        <div style="display: block; margin: auto; max-width: 600px;" class="main">
                        <h1 style="font-size: 18px; font-weight: bold; margin-top: 20px">Congrats for sending test email with Mailtrap!</h1>
                        <p>Inspect it using the tabs you see above and learn how this email can be improved.</p>
                        <img alt="Inspect with Tabs" src="assets\img\logo prope.jpg" style="width: 100%;">
                        <p>Now send your email using our fake SMTP server and integration of your choice!</p>
                        <p>Good luck! Hope it works.</p>  <p><a href="https://yanis.simplon-charleville.fr/ecommerce/Connexion"> Connectez vous </a></p>
                        </div>
                        <!-- Example of invalid for email html/css, will be detected by Mailtrap: -->
                        <style>
                        .main { background-color: white; }
                        a:hover { border-left-width: 1em; min-height: 2em; }
                        </style>
                    </body>
                    </html>
                  
                    ';

                    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                    $headers[] = 'MIME-Version: 1.0';
                    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                    $headers[] = 'From: "Metropolis Simplon" <yanis.pirlet@gmail.com> ';
                    // En-têtes additionnels
                
                    mail($to, $subject, $message, implode("\r\n", $headers));
                    header('location:../../../changementmdp.php?id=envoimail');
                }
            }
