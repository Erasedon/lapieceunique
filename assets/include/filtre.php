<?php
    
    include 'assets/db/connectdb.php'; 
    
    ?>

<div class="container cat">
    
            <?php

            // ici la requete si on a que le genre
            $sel = "SELECT * FROM articles a, genres g, categories c, sous_categories sc";

            $affichearticle = "";

            // ici la requete si on a que le genre
            if ((isset($_GET['genres'])))
            {
                $sel .= " WHERE a.id_genres = g.id_genres";
                $sel .= " AND a.id_categories = c.id_categories";
                $sel .= " AND a.id_sous_categories = sc.id_sous_categories";
                $sel .= " AND a.id_genres = '".$_GET['genres']."'";

                $requete2 = $db ->prepare($sel);
                $requete2 ->execute();
                $affiche2 = $requete2->fetch();

                $affichearticle .= $affiche2['nom_genres'];
            }

            if ((isset($_GET['categories'])))
            {
                $sel .= " AND a.id_categories = '".$_GET['categories']."'";

                $requete3 = $db ->prepare($sel);
                $requete3 ->execute();
                $affiche3 = $requete3->fetch();

                $affichearticle .= " / ".$affiche3['nom_categories'];
            }

            if ((isset($_GET['sous_cat'])))
            {
                $sel .= " AND a.id_sous_categories = '".$_GET['sous_cat']."'";

                $requete4 = $db ->prepare($sel);
                $requete4 ->execute();
                $affiche4 = $requete4->fetch();

                $affichearticle .= " / ".$affiche4['nom_sous_categories'];
            }

            $requete = $db->prepare($sel);
            $requete->execute();

        ?>

        <h1 style="text-align:center;">
            <?php  echo  $affichearticle; ?>
        </h1>
        <?php
        
        
        
        ?>
<div class="container-filtre-tb">
        <div class="categorie-filtre-tb">
            <!-- filtre -->
            <div class="filtre">



                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Filtre: </h5>
                            <h6>Poster</h6>
                            <h6>POP</h6>
                            <h6>Jeu d'occasion</h6>
                        </div>
                        <div class="card-body">
                            <h6>Genre</h6>
                            <hr>
                            <?php
                                    $con = mysqli_connect("db5006773312.hosting-data.io","dbu2407296","5Rc3y4Zg","dbs5603904");

                                    $brand_query = "SELECT * FROM genres";
                                    $brand_query_run  = mysqli_query($con, $brand_query);

                                    if(mysqli_num_rows($brand_query_run) > 0)
                                    {
                                        foreach($brand_query_run as $brandlist)
                                        {
                                            $checked = [];
                                            if(isset($_GET['genress']))
                                            {
                                                $checked = $_GET['genress'];
                                            }
                                            ?>
                            <div>
                                <input type="checkbox" name="genress[]" value="<?= $brandlist['id_genres']; ?>"
                                    <?php if(in_array($brandlist['id_genres'], $checked)){ echo "checked"; } ?> />
                                <?= $brandlist['nom_genres']; ?>

                            </div>
                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Brands Found";
                                    }
                                ?>
                        </div>
                    </div>
                    <!-- TEST -->
                    <div class="card-body">
                            <h6>sous catégories</h6>
                            <hr>
                            <?php
                                    $con = mysqli_connect("db5006773312.hosting-data.io","dbu2407296","5Rc3y4Zg","dbs5603904");

                                    $brand_query = "SELECT * FROM sous_categories";
                                    $brand_query_run  = mysqli_query($con, $brand_query);

                                    if(mysqli_num_rows($brand_query_run) > 0)
                                    {
                                        foreach($brand_query_run as $brandlist)
                                        {
                                            $checked = [];
                                            if(isset($_GET['sous_cat2']))
                                            {
                                                $checked = $_GET['sous_cat2'];
                                            }
                                            ?>
                            <div>
                                <input type="checkbox" name="sous_cat2[]" value="<?= $brandlist['id_sous_categories']; ?>"
                                    <?php if(in_array($brandlist['id_sous_categories'], $checked)){ echo "checked"; } ?> />
                                <?= $brandlist['nom_sous_categories']; ?>

                            </div>
                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Brands Found";
                                    }
                                ?>
                        </div>
                    </div>
                    <!-- RANGE PRIX -->
                    <div class="card-body">            

                    <?php 

                    // echo "get prix : ";
                    // echo $_GET['prix3'];
                            if (empty($_GET['prix3'])){$valeur = "200";}
                            if (!empty($_GET['prix3'])) {
                                                               
                                $valeur = $_GET['prix3'];
                            
                            }
                    ?> 
                    
                        <div class="slidecontainer">
                        <p>Choisis ton prix max</p>
                            <input type="range" name="prix3" min="1" max="200" value="<?php echo $valeur; ?>" class="slider" id="myRange" style="background-color:#000; height:4px; width:200px">
                            <p>Prix: <span id="demo"></span> € aux max</p>
                        </div>
                        <div class="slidecontainer">
                        <button type="submit" class="button-filtre">Chercher</button>
                        </div>
                    </div>
                    
                </form>
                
                
                

            </div>

            <!-- FIN filtre -->