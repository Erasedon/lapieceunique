// function getCouleur(val)
// {
//     // console.log(val);

//     const queryString = window.location.search;
//     const urlParams = new URLSearchParams(queryString);
//     const product = urlParams.get('id_article')
//     // console.log("id article = ")
//     // console.log(product);

//     $.ajax({
//         type: "POST", 
//         url: "traitement_article.php", 
//         data: {tailles:val, id_article:product},
//         success: function (data){

//         $("#afficher").html(data);
//         }
//     });
// }

function getPhoto(val)
{
    // console.log("valeur");
    // console.log(val);

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const product = urlParams.get('id_article')
    // console.log("id article = ")
    // console.log(product);

    $.ajax({
        type: "POST", 
        url: "traitement_article2.php", 
        data: {couleurs:val, id_article:product},
        success: function (data2){
        // console.log("test");
        // console.log(couleurs);

        const obj = JSON.parse(data2);

        // console.log(obj.photo1);

        $("#afficher").empty();
        $("#afficher").html(obj.html);

        $("#photo0").empty();
        $("#photo0").html(obj.photo0);

        $("#photo1").empty();
        $("#photo1").html(obj.photo1);

        $("#photo2").empty();
        $("#photo2").html(obj.photo2);

        $("#photo22").empty();
        $("#photo22").html(obj.photo2);

        $("#photo3").empty();
        $("#photo3").html(obj.photo3);
        
        $("#photo33").empty();
        $("#photo33").html(obj.photo3);
        }
    });
}















// function ChoixC(id)
// {
//     console.log("test");

//     $.post(
//         'traitement_article.php', 
//         {tailles:id}, 
//         function (donnees){
//             $('#afficher').append(donnees);
//         }
        
//     );

// }