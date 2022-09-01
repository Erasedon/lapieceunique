<div class="container">
    <div class="connexion">
        <h3>Connexion :</h3>
        <?php 
            if(isset($_GET['id'])){
                    switch ($_GET['id']){
                        case "ermailmdp":
                            echo "<p class='error'> Connexion impossible :<br> Email ou Mot de passe oublié</p>";
                            break;
                        case "succesinscrit":
                            echo " <p class='sucess'>Vous êtes bien inscrit, vous pouvez maintenant vous connecter !</p>";
                            break;
                            case "erexistpas":
                            echo "<p class='error'> Vous etes pas inscrit   </p>";
                            break;
                            case "pasvalider":
                            echo "<p class='error'>Vous n'etes pas valider </p>";
                            break;
                            case "ncompris":
                                echo "<p class='error'> Erreur est le contenu </p>";
                                break;
                                case "demm":
                                    echo "<p class='error'>Votre demande de reinitiation de votre mot de passe est bien prit en compte </p>";
                                    break;
                                    case "erchangmdp":
                                    echo "<p class='error'>Votre demande de reinitiation de votre mot de passe à expirer</p>";
                                    break;
                        }
                }
        ?> 	 

        <form method="post" action="assets/includes/traitement/traitementco.php">
            <label for="" class="titr_la">Adresse mail :</label>
            <input type="text" name="mail" class="titr_in">

            <label for="" class="titr_la">Mot de passe :</label>
            <input type="text" name="mdp" class="titr_in">

            <div class="aide">
                <div class="check"><input type="checkbox" class="checkbox"><label for="">Se souvenir de moi</label></div>
                <a href="verificationmail.php" class="mdp_oublie">mot de passe oublié ?</a>
            </div>

            <input type="submit" class="sub" value="S'identifier">
        </form>

        <div class="co_ins">
            <p>Pas encore membre ?</p>
            <a href="inscription.php" class="mdp_oublie">Rejoignez-nous !</a>
        </div>
    </div>
</div>
