$( document ).ready(function() {

    var favoris = document.getElementById("favoris").value;

    console.log(favoris);

    $('.formulaire').submit(function(e){
        e.preventDefault();
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const product = urlParams.get('id_article')
        // console.log("id article = ")
        // console.log(product);

    
    $.post('traitement_favoris.php', {favoris:favoris, id_article:product}, function (donnees){

            const obj = JSON.parse(donnees);

            $('.favorisa').empty();
            $('.favorisa').append(obj.html);
            $('.favorisb').empty();
            $('.favorisb').append(obj.favoris);

        }
        );


    });

});