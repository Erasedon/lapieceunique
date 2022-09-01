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
                                    <i class="fa-regular fa-barcode-read fa-3x"></i>
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
                            $query = "SELECT * FROM categories ORDER BY id_categories";
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




            <!-- FIN filtre -->



            <script>
                // Fonction qui va récupér les paramètres GET

                $(document).ready(function() {

                    var currentURL = document.URL;

                    const url = new URL(window.location);

                    // rechercher une valeur dans un url

                    function getParameterByName(name, url = window.location.href) {
                        name = name.replace(/[\[\]]/g, '\\$&'); // regex qui traite la chaine
                        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                            results = regex.exec(url);
                        if (!results) return null;
                        if (!results[2]) return '';
                        return decodeURIComponent(results[2].replace(/\+/g, ' '));
                    }


                    var page = (getParameterByName('page') == null) ? 1 : getParameterByName('page');
                    var limit = (getParameterByName('limit') == null) ? 5 : getParameterByName('limit');


                    filter_data(page, limit);

                    function filter_data(page = 1, limit = 5) {

                        $('.filter_data').html('<div id="loading" style="" ></div>');
                        var action = 'fetch_data';
                        var minimum_price = $('#hidden_minimum_price').val();
                        var maximum_price = $('#hidden_maximum_price').val();
                        console.log(maximum_price, minimum_price);

                        var brand = get_filter('brand');
                        var ram = get_filter('ram');
                        var storage = get_filter('storage');


                        var object = {}

                        if (action = !null) {
                            object.action = action;
                        }
                        if (limit != null) {
                            object.limit = limit;
                        }
                        if (page != null) {
                            object.page = page;
                        }
                        if (minimum_price != "") {
                            object.minimum_price = minimum_price;
                        }
                        if (maximum_price != "") {
                            object.maximum_price = maximum_price;
                        }
                        if (brand != "") {
                            object.brand = brand;
                        }
                        if (ram != "") {
                            object.ram = ram;
                        }
                        if (storage != "") {
                            object.storage = storage;
                        }


                        $.ajax({
                            url: "assets/includes/cards.php",
                            method: "GET",
                            data: object,
                            success: function(data) {
                                $('.filter_data').html(data);
                            }
                        });

                    }

                    // recuperer la valeur des checkbox 
                    function get_filter(class_name) {
                        // un array vide mit dans la variable filter & dans le tableau du class_name tout les checkbox true sont ajouter a la variable checkbox
                        var filter = [];
                        var checkbox = $('.' + class_name + ':checked'); 
                        // ensuite on verifie si chexbox  est vide donc l'url sera vider et on modifie l'historique pour que l'utilisateur si retrouve 
                        if(checkbox.length < 1) {
                            history.pushState({}, '', url);
                            url.searchParams.delete(class_name);

                        } else {
                            // sinon si checkbox n'est pas vide  on  modifie l'url en ajoutant class_name = filter sans oublier historique .
                            checkbox.each(function(i) {
                                filter.push($(this).val());
                            });

                            url.searchParams.set(class_name, filter.toString());         
                            history.pushState({}, '', url);
                        }
                        // on retourne le tableau sous la forme  d'une chaine de caractere 
                        return filter.toString();
                    }

                    $('.common_selector').on('click', function() {
                        filter_data();
                    });


                    $('.filter_data').on(
                        'click',
                        '.pag_selector',
                        function(e) {
                            const page = $(e.target).data('page');
                            filter_data(page, limit);
                            url.searchParams.set('page', page);
                            history.pushState({}, '', url);

                        });


                    $('.filter_data').on('click', '.limit_selector', function(e) {
                        const limit = $(e.target).data('limit');
                        filter_data(page, limit);

                        url.searchParams.set('limit', limit);
                        history.pushState({}, '', url);
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
            <!-- urlresultat = history.pushState(currentURL,window.location.replace('?'+urlreplace.substr(0, urlreplace.length - 1)));  -->