       // Fonction qui va récupér les paramètres GET

       $(document).ready(function() {

        var currentURL = document.URL;

        // // rechercher une valeur dans un url

        function getParameterByName(name, currentURL) {
            name = name.replace(/[\[\]]/g, '\\$&'); // regex qui traite la chaine
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(currentURL);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        var page=(getParameterByName('page')== null) ? 1 :getParameterByName('page');
        var limit =(getParameterByName('limit')== null) ? 5 :getParameterByName('limit');
       
        
        const url = new URL(window.location);

        filter_data(page, limit);
        var brandresp="";
        var ramresp="";
        var storageresp="";
        function filter_data(page = 1, limit = 5, brandresp,ramresp,storageresp) {
          
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var brand = get_filter('brand');
            var ram = get_filter('ram');
            var storage = get_filter('storage');
            var datas = {}
         
           console.log(brandresp);

           
            if (action = !null) { datas.action = action;}
            if (limit != null) { datas.limit = limit; }
            if (page != null) {  datas.page = page; }
            if (minimum_price != "") { datas.minimum_price = minimum_price;  }
            if (maximum_price != "") { datas.maximum_price = maximum_price;}
            if (brand != "") { datas.brand = brand;}
            if (brandresp != "") { datas.brand = brandresp;}
            if (ramresp != "") { datas.ram = ramresp;}
            if (storageresp != "") { datas.storage = storageresp;}
            if (ram != "") {datas.ram = ram; }
            if (storage != "") { datas.storage = storage; }

            $.ajax({
                url: "assets/includes/cards.php",
                method: "GET",
                data: datas,
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

          $('#brandresp').on('change', function() {
            brandrespe = document.getElementById('brandresp').value;
            const brandresp = url.searchParams.set('genres', brandrespe);
            console.log(brandresp);
            history.pushState({}, '', url);
          
              filter_data(page,limit,brandresp,ramresp,storageresp);
            });  
            $('#ramresp').on('change', function() {
                ramresp= document.getElementById('ramresp').value;
                url.searchParams.set("ram", ramresp);         
                history.pushState({}, '', url);
                  filter_data(page,limit,brandresp,ramresp,storageresp);
                }); 
             $('#storageresp').on('change', function() {
                storageresp = document.getElementById('storageresp').value;
                url.searchParams.set("storage", storageresp);   
                   
                history.pushState({}, '', url);
                      filter_data(page,limit,brandresp,ramresp,storageresp);
                    });
          
        // onclick des checkbox du filtre 
        $('.common_selector').on('click', function() {
            filter_data();
        });

       
        // onclick de la pagination des posters 
        $('.filter_data').on(
            'click',
            '.pag_selector',
            function(e) {
                const page = $(e.target).data('page');
                url.searchParams.set('page', page);
                limitbase = 5;
                const limit =(url.searchParams.get('limit')== null) ?  url.searchParams.set('limit', limitbase) :url.searchParams.get('limit');
                history.pushState({}, '', url);
          
                filter_data(page, limit);

            });

        //onclick de la limite de nombre de posters afficher 
        $('.filter_data').on('click', '.limit_selector', function(e) {
            const limit = $(e.target).data('limit');
            pagebase = 1;
            url.searchParams.set('limit', limit);
            const page =(url.searchParams.get('page')== null) ?  url.searchParams.set('page', pagebase):url.searchParams.get('page');
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