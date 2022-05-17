let photo2 = document.getElementsByClassName('photo2');

let nbr__img = photo2.length; //permet de savoir combien il y aura d"image a traiter dans notre "tableau"


// il faut une fonction pour supprimer le style active sur toutes les images 
function enleverActiveImages2()
{
    // on fait une boucle pour traiter toutes les images une a une
    for(let i = 0 ; i < nbr__img ; i++)
    {
        photo2[i].classList.remove('active'); // pour image courante, image inspecter par la boucle et on enleve la class active sur toutes les images
    }
}

function choixPhoto(a){

    enleverActiveImages2();

    // le A me donne le chiffre de l'image voulu
    photo2[a].classList.add('active');

}


/*LOUPE*/

// var src = document.getElementById('image1').src;
