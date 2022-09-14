<nav id="navbar">
        <img id="nav-logo" src="assets/img/logo.png" alt="Logo P&C">
        <a id="nav-toggle-button">
                <span class="nav-toggle-bar1"></span>
            <span class="nav-toggle-bar2"></span>
            <span class="nav-toggle-bar3"></span>
        </a>
        <div id="nav-links">
                <ul>
                    <?php 
                          if(isset($_SESSION['role']) > 0 ){
                        ?>  
                                <li><a href="Accueil">Accueil</a></li>
                                <li><a href="ajoutposter.php">Ajout poster</a></li>
                                <li><a href="occasion.php">Occasion</a></li>
                                <li><a href="scanner.php">Scanner </a></li>
                                <li class="users"> <a href="Deconnexion">Déconnexion</a></li>
                                
                        <?php
                             }else { ?>
                                        <li><a href="Accueil">Accueil</a></li>
                                        <li><a href="scanner.php">Scanner </a></li>
                                        <li class="users"><a href="Inscription">S'inscrire</a></li>
                                        <li class="users"><a href="Connexion">S'identifier</a></li>
                          <?php  
                                }       
                         ?>
            </ul>
        </div>
</nav>
<script src="https://kit.fontawesome.com/6e2531b7ef.js" crossorigin="anonymous"></script>
