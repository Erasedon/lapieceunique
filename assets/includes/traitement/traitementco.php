<?php
       include '../../db/connectdb.php';
       
       if(isset( $_POST['mail']) && isset( $_POST['mdp'])){
           $mail = htmlspecialchars($_POST['mail']); 
           $mdp = htmlspecialchars($_POST['mdp']);
           
           $sql = "SELECT * FROM utilisateurs WHERE mail_utilisateurs = :email_users"; 
                    $prepare = $db->prepare($sql);   
                    $prepare ->execute(array(':email_users' => $mail));
                    $result = $prepare->fetch();
                    $count = $prepare->rowCount();
                    if($count > 0){
                 
                        if($mail == $result['mail_utilisateurs'] && password_verify($mdp,$result['password_utilisateurs'])){
                            if($result['activation_utilisateurs']){  
                                session_start();
                                $_SESSION['role'] = $result['id_roles'];
                                $_SESSION['mail'] = $result['mail_utilisateurs'];
                                $_SESSION['prenom'] =  $result['prenom_utilisateurs'];
                                $_SESSION['nom'] =  $result['nom_utilisateurs'];
                                $_SESSION['mdp'] =  $result['password_utilisateurs'];
                                $_SESSION['activer'] =  $result['activation_utilisateurs'];
                       
                                header("Location:../../../index.php");
                            }else{
                                header("Location:../../../connexion.php?id=pasvalider");   
                            }
                            
                        } else {
                            header("Location:../../../connexion.php?id=ermailmdp");
                        }
                    } else {
                      
                        session_destroy(); 
                        header("Location:../../../connexion.php?id=erexistpas");
                    }
                }else{
                    header("Location:../../../connexion.php?id=ncompris");
                    
        }

?>
