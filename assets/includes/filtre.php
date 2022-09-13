<?php

include 'assets/db/connectdb.php';

?>

<div class="container-fluid">


    <div class="container-filtre-tb col-6 col-lg-4">
        <div id="testres">
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
                                    <label><input type="checkbox" class="common_selector brand"
                                            value="<?php echo $row['id_genres']; ?>">
                                        <?php echo $row['nom_genres']; ?></label>
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

        <div class="col-sm-6 col-lg-8">
            <br />
            <div class="row filter_data">


            </div>

        </div>


        <!-- FIN filtre -->




        <!-- FIN filtre -->