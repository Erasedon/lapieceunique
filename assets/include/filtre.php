<?php

include 'assets/db/connectdb.php';

?>

<div class=" container cat">


    <div class="container-filtre-tb">
        <div class="categorie-filtre-tb">
            <!-- filtre -->
            <div class="filtre">

                <div class="card shadow mt-4">
                    <div class="card-header">

                    </div>
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
                                    <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['id_genres']; ?>"> <?php echo $row['nom_genres']; ?></label>
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
                            $query = "
                                SELECT * FROM categories ORDER BY id_categories 
                                ";
                            $statement = $db->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach ($result as $row) {
                            ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="checkbox" class="common_selector storage" value="<?php echo $row['id_categories']; ?>"> <?php echo $row['nom_categories']; ?> </label>
                                </div>
                            <?php
                            }
                            ?>

                        </div>


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
                                <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['id_sous_categories']; ?>"> <?php echo $row['nom_sous_categories']; ?></label>
                            </div>
                        <?php
                        }

                        ?>
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
        <div class="col-md-9">
            <br />
            <div class="row filter_data">

            </div>
            <div class="clearfix">
                <div class="hint-text">Voir les <b>5</b> out of <b>25</b> entries</div>
                <div class="data_pag">

                </div>
            </div>
        </div>




        <!-- FIN filtre -->






        <script>
            $(document).ready(function() {

                filter_data();

                function filter_data() {
                    $('.filter_data').html('<div id="loading" style="" ></div>');
                    var action = 'fetch_data';
                    var minimum_price = $('#hidden_minimum_price').val();
                    var maximum_price = $('#hidden_maximum_price').val();
                    var brand = get_filter('brand');
                    var ram = get_filter('ram');
                    var storage = get_filter('storage');
                    var page = $("#testpage").hasClass("page");
                    
                    var  object = {
                        // action: action,
                        //     minimum_price: minimum_price,
                        //     maximum_price: maximum_price,
                        //     brand: brand,
                        //     ram: ram,
                        //     storage: storage,
                        //     page: page
                    }

                    if (action=!null) {object.action=action}
                    if (minimum_price!="") {object.minimum_price = minimum_price;}
                    if (maximum_price!="") {object.maximum_price = maximum_price;}
                    if (brand!="") {object.brand = brand;}
                    if (ram!="") {object.ram = ram;}
                    if (storage!="") {object.storage = storage;}
                    if (page!=null) {object.page = page;}

              

                    $.ajax({
                        url: "assets/include/cards.php",
                        method: "GET",
                        data: object,
                        success: function(data) {
                            $('.filter_data').html(data);

                        }
                    });
                }

                function get_filter(class_name) {
                    var filter = [];
                    $('.' + class_name + ':checked').each(function() {
                        filter.push($(this).val());
                    });

                    return filter.toString();
                }

                $('.common_selector').click(function() {
                    filter_data();
                });

                $('#price_range').slider({
                    range: true,
                    min: 5,
                    max: 500,
                    values: [5, 500],
                    step: 1,
                    stop: function(event, ui) {
                        $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimum_price').val(ui.values[0]);
                        $('#hidden_maximum_price').val(ui.values[1]);
                        filter_data();
                    }
                });

            });
        </script>

        <!-- FIN filtre -->