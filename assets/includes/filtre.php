<?php

include 'assets/db/connectdb.php';

$sql = "SELECT * FROM articles a, genres g,images i, categories c, sous_categories sc 
WHERE a.id_genres = g.id_genres AND a.id_categories = c.id_categories AND a.id_sous_categories = sc.id_sous_categories AND  a.id_articles = i.id_articles ";
$prepare = $db->prepare($sql);   
$prepare ->execute();
$result = $prepare->fetch();


$reqgenres = "SELECT * FROM genres";
$preparegenres = $db->prepare($reqgenres);   
$preparegenres ->execute();
$resultgenres = $preparegenres->fetchALL();

$reqsouscat = "SELECT * FROM sous_categories";
$preparesouscat = $db->prepare($reqsouscat);   
$preparesouscat ->execute();
$resultsouscat = $preparesouscat->fetchALL();

$reqcat = "SELECT * FROM categories";
$preparecat = $db->prepare($reqcat);   
$preparecat ->execute();
$resultcat = $preparecat->fetchALL();
?>
<div id="filtretel">
<div class="row g-3">
            <div class="col-md">
                    <div class="form-floating">
                        <select id="brandresp" name="selgenres"  class="form-select" id="floatingSelectGrid">
                            <option value="0">liste des genres</option>
                            <?php
                            foreach ($resultgenres as $row) {
                                                            
                                ?>
                                <option value="<?php echo $row['id_genres'] ?>"><?php echo $row['nom_genres'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelectGrid">liste des genres</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select id="ramresp" name="selcat" class="form-select" id="floatingSelectGrid">
                           
                            <option value="0">liste des categories</option>
                            <?php
                            foreach ($resultcat as $row) {
                                                               ?>
                                                                    
                                <option value="<?php echo $row['id_categories'] ?>"><?php echo $row['nom_categories'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelectGrid">listes des categories</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select id="storageresp" name="selsouscat" class="form-select" id="floatingSelectGrid">
                            <option value="0">liste des sous_categories</option>
                            <?php
                         
                            foreach ($resultsouscat as $row) {
                               
                                
                                    ?>
                                    
                                <option value="<?php echo $row['id_sous_categories'] ?>"><?php echo $row['nom_sous_categories'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelectGrid">listes des sous_categories</label>
                    </div>
                </div>
            </div> 

</div>
<div class="container-fluid">
    <div class="container-filtre-tb col-6 col-lg-4">
             <div id="filtredesktop">
            <!-- filtre -->
            <div class="filtre">

                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <h4>Genre</h4>
                            <hr>
                            <div>
                                <?php
                            $query = "SELECT * FROM genres ORDER BY id_genres";
                            $statement = $db->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach ($result as $row) {
                            ?>
                                <div class="list-group-item checkbox">
                                    <i class="fa-regular fa-barcode-read fa-3x"></i>
                                    <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['id_genres']; ?>"><?php echo $row['nom_genres']; ?></label>
                                </div>
                                <?php
                            }

                            ?>

                                <div>

                                </div>
                            </div>

                        </div>

                        <!-- TEST -->

                        <div class="card-body">
                            <h4> catégories</h4>
                            <hr>

                            <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                                <?php
                            $query = "SELECT * FROM categories ORDER BY id_categories";
                            $statement = $db->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach ($result as $row) {
                            ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="checkbox" class="common_selector storage"
                                            value="<?php echo $row['id_categories']; ?>">
                                        <?php echo $row['nom_categories']; ?> </label>
                                </div>
                                <?php
                            }
                            ?>

                            </div>


                        </div>

                        <div class="card-body">
                            <h4>sous catégories</h4>
                            <div style="height: 250px; overflow-y: auto; overflow-x: hidden;">
                                <?php

                        $query = "
                            SELECT * FROM sous_categories ORDER BY id_sous_categories
                            ";
                        $statement = $db->prepare($query);
                        $statement->execute();
                        $result = $statement->fetchAll();
                        foreach ($result as $row) {
                        ?>
                                <div class="list-group-item checkbox">

                                    <label><input type="checkbox" class="common_selector ram"
                                            value="<?php echo $row['id_sous_categories']; ?>">
                                        <?php echo $row['nom_sous_categories']; ?></label>
                                </div>
                                <?php
                        }

                        ?>
                            </div>
                        </div>

                    </div>
                </div>
                
                
                
                
                <!-- RANGE PRIX -->
                <div class="card-body">
                    
                    
                    <div class="slidecontainer">
                        
                        <h4>Prix</h4>
                        <input type="hidden" id="hidden_minimum_price" value="5" />
                        <input type="hidden" id="hidden_maximum_price" value="500" />
                        <p id="price_show">5 - 500</p>
                        <div id="price_range"></div>
                        
                    </div>
                    
                </div>
            </div>

        </div>
        <div class="b-example-divider b-example-vr"></div>
        <div class="col-sm-6 col-lg-8">
            <br />
            <div class="row filter_data">


            </div>

        </div>


        <!-- FIN filtre -->




        <!-- FIN filtre -->