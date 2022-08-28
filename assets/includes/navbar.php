<nav id="navbar">
        <img id="nav-logo" src="assets/img/logo.png" alt="Logo P&C">
        <a id="nav-toggle-button">
            <span class="nav-toggle-bar1"></span>
            <span class="nav-toggle-bar2"></span>
            <span class="nav-toggle-bar3"></span>
        </a>
        <div id="nav-links">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="ajoutposter.php">Ajout poster</a></li>
                <li><a href="occasion.php">Occasion</a></li>
                <li><a href="scanner.php">Scanner</a></li>
            </ul>
        </div>
        <?php 

            if(isset($_SESSION['role']) > 0 ){
            ?>  <div class="user">
                <ul>
                    <a href="deconnexion"><li class="users">Déconnexion</li></a>
                </ul>
            </div>
            <?php
            }else { ?>
            <div class="user">
                <ul>
                    <a href="Inscription"><li class="users">S'inscrire</li></a>
                    <a href="Connexion"><li class="users">S'identifier</li></a>
                </ul>
            </div>
                <?php  
            }

            ?>
</nav>
