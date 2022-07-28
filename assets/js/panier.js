$( document ).ready(function() {

   

        $('.formpanier').submit(function(e){
        e.preventDefault();
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const product = urlParams.get('id_article')
        console.log("id article = ")
        console.log(product);

        var tailles = document.getElementById("tailles").value;
        var couleurs = document.getElementById("couleurs").value;

    
    $.post('traitement_panier.php', {tailles:tailles, couleurs:couleurs, id_article:product}, function (donnees){

            const obj = JSON.parse(donnees);
            $(".affichermess").empty();
            $(".affichermess").html(obj.html);

            $(".panier").empty();
            $(".panier").html(obj.panier);

        });


    });

});