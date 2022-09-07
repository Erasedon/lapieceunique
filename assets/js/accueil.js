       // Fonction qui va récupér les paramètres GET

       $(document).ready(function() {

        var currentURL = document.URL;

        const url = new URL(window.location);

        // // rechercher une valeur dans un url

        function getParameterByName(name, url) {
            name = name.replace(/[\[\]]/g, '\\$&'); // regex qui traite la chaine
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        var page = (getParameterByName('page') == null) ? url.searchParams.get('page') : getParameterByName('page');
        var limit = (getParameterByName('limit') == null) ? url.searchParams.get('limit') : getParameterByName('limit');
 

        filter_data(page, limit);

        function filter_data(page, limit) {

            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();

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
                                    url.searchParams.set('page', page);
                                    history.pushState({}, '', url);
                                    filter_data(page, limit);
        
                                });
        
        
                            $('.filter_data').on('click', '.limit_selector', function(e) {
                                const limit = $(e.target).data('limit');
                                
                                url.searchParams.set('limit', limit);
                                history.pushState({}, '', url);
                                filter_data(page, limit);
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

    // urlresultat = history.pushState(currentURL,window.location.replace('?'+urlreplace.substr(0, urlreplace.length - 1))); 