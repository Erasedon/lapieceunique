<?php 
    include 'assets/db/connectdb.php';
$sql = "SELECT * FROM articles a, occasion o
WHERE a.id_occasion = o.id_occasion AND a.id_occasion = :id_occasion";
$prepare = $db->prepare($sql);   
$prepare ->execute(array(':id_occasion' => $_GET['id_occasion']));
$result = $prepare->fetch();



if ((!empty($_GET['id_occasion'])))
{
?>
<div class="container">
    <div class="inscription">
        <h3>Formulaire d'occasion :</h3>

        <div class="error"></div>

        <form method="post" action="assets/includes/traitement/traitementoc.php" id="formajax" enctype="multipart/form-data">
            <div class="model_un">
                <div class="nom">
                    <label for="">Nom :</label>
                    <input type="text" name="nomfo"  value="<?php echo $result['nom_occasion'] ?>" >
                </div>

                <div class="prenom">
                    <label for="">Prénom :</label>
                    <input type="text" name="prenomfo"  value="<?php echo $result['prenom_occasion'] ?>"  required>
                </div>
            </div>
            <div class="model_deux">
                <label for="">Date de naissance :</label>
                <input type="date" name="datefo" value="<?php echo $result['date_occasion'] ?>" required>
            </div>

            <div class="model_deux">
                <label for="">Adresse mail :</label>
                <input type="text" name="mailfo" value="<?php echo $result['amail_occasion'] ?>" required>
            </div>
            
            <div class="model_deux">
                <label for="">Pays :</label>
                <input type="text" name="paysfo" required>
            </div>
            
            <div class="model_deux">
                <label for="">Adresse :</label>
                <input type="text" name="adressefo"  value="<?php echo $result['ville_occasion'] ?>" required>
            </div>
            
            <div class="model_un">
                <div class="nom">
                    <label for="">Code postal :</label>
                    <input type="text" name="cpfo" value="<?php echo $result['cp_occasion'] ?>" required>
                </div>
                
                <div class="prenom">
                    <label for="">Ville :</label>
                    <input type="text" name="villefo" value="<?php echo $result['ville_occasion'] ?>" required>
                </div>
            </div>
            <div class="model_deux">
                <label for="">Nom du Produit:</label>
                <input type="text" name="nomap" value="<?php echo $result['nom_articles'] ?>" required>

            </div>
            <div class="model_deux">
                <label for="">Description du produit :</label>
                <input type="text" name="Descriptionap" value="<?php echo $result['description_articles'] ?>" required>
            </div>
            <div class="model_un">
                <div class="nom">
                    <label for="">Code barre :</label>
                    <!-- <input type="file" name="cbpap" required> -->
                <a class="sub" id="startButton">Start</a>
                <a class="sub" id="resetButton">Reset</a>
            </div>
			</div> 
             <div id="sourceSelectPanel" style="display:none">
                <label for="sourceSelect">Change video source:</label>
                <select id="sourceSelect" style="max-width:400px">
                </select>
            </div>
            <div>
                <video id="video" class="model_deux" style="border: 1px solid gray ;"></video>
            </div>

          
                <div class="prenom">
                    <label for="">Code barre :</label>
                    <input type="text"id="result" name="barretxtap" value="<?php echo $result['cbp_occasion'] ?>" required>
                </div>

            <div class="model_deux">
                <label for="">quantité :</label>
                <input type="text" name="quantité" value="<?php echo $result['quantite_articles'] ?>"required>
            </div>           
            <div class="model_deux">
                <label for="">Carte d'identité :</label>
                <input type="file" name="cifo" value="<?php echo $result['ci_occasion'] ?>"required>
                <img style="max-width:400px" id="ancienneimage" src="assets/uploads/<?php echo $result['ci_occasion'] ?> ?>"
                        alt="<?php echo $result['ci_occasion'] ?> ?>">
            </div>
            <div class="model_deux">
                <label for="">prix rachat :</label>
                <input type="text" name="prixachat" value="<?php echo $result['prix_articles'] ?>"required>
            </div>
          
            <div class="model_deux">
                <label for=""></label>
            
            </div>
            <input type="submit" class="sub" value="Enregistrer">
            <script>
    function imprimer(divName) {
          var printContents = document.getElementById(divName).innerHTML;    
       var originalContents = document.body.innerHTML;      
       document.body.innerHTML = printContents;     
       window.print();     
       document.body.innerHTML = originalContents;
       }
    </script>
   
    <button onClick="imprimer('sectionAimprimer')">Imprimer</button>

    
   
        </form> 
        <div id='sectionAimprimer'>
    Résultat MySQL ou tableau HTML à imprimer
      </div>

</div>
<?php
}else{

?>
<div class="container">
    <div class="inscription">
        <h3>Formulaire d'occasion :</h3>

        <div class="error"></div>

        <form method="post" action="assets/includes/traitement/traitementoc.php" id="formajax" enctype="multipart/form-data">
            <div class="model_un">
                <div class="nom">
                    <label for="">Nom :</label>
                    <input type="text" name="nomfo" required>
                </div>

                <div class="prenom">
                    <label for="">Prénom :</label>
                    <input type="text" name="prenomfo" required>
                </div>
            </div>
            <div class="model_deux">
                <label for="">Date de naissance :</label>
                <input type="date" name="datefo" required>
            </div>

            <div class="model_deux">
                <label for="">Adresse mail :</label>
                <input type="text" name="mailfo" required>
            </div>
            
            
            <div class="model_deux">
                <label for="">Pays :</label>
                <input type="text" name="paysfo" required>
            </div>
            
            <div class="model_deux">
                <label for="">Adresse :</label>
                <input type="text" name="adressefo" required>
            </div>
          
            <div class="model_un">
                <div class="nom">
                    <label for="">Code postal :</label>
                    <input type="text" name="cpfo" required>
                </div>
                
                <div class="prenom">
                    <label for="">Ville :</label>
                    <input type="text" name="villefo" required>
                </div>
            </div>  
            <div class="model_deux">
                <label for="">Nom du Produit:</label>
                <input type="text" name="nomap" required>

            </div>
            <div class="model_deux">
                <label for="">Description du produit :</label>
                <input type="text" name="Descriptionap" required>
            </div>
            <div class="model_un">
                <div class="nom">
                    <label for="">Code barre :</label>
                    <!-- <input type="file" name="cbpap" required> -->
                <a class="sub" id="startButton">Start</a>
                <a class="sub" id="resetButton">Reset</a>
            </div>
			</div> 
             <div id="sourceSelectPanel" style="display:none">
                <label for="sourceSelect">Change video source:</label>
                <select id="sourceSelect" style="max-width:400px">
                </select>
            </div>
            <div>
                <video id="video" class="model_deux" style="border: 1px solid gray ;"></video>
            </div>

          
                <div class="prenom">
                    <label for="">Code barre :</label>
                    <input type="text"id="result" name="barretxtap" required>
                </div>

            <div class="model_deux">
                <label for="">quantité :</label>
                <input type="text" name="quantité" required>
            </div>     
            <div class="model_deux">
                <label for="">Carte d'identité :</label>
                <input type="file" name="file" required>
            </div>
            <div class="model_deux">
                <label for="">prix rachat :</label>
                <input type="text" name="prixachat" required>
            </div>
            <div class="model_deux">
                <label for=""></label>
            
            </div>
            <input type="submit" class="sub" value="Enregistrer">
            <script>
    function imprimer(divName) {
          var printContents = document.getElementById(divName).innerHTML;    
       var originalContents = document.body.innerHTML;      
       document.body.innerHTML = printContents;     
       window.print();     
       document.body.innerHTML = originalContents;
       }
    </script>
   
    <button onClick="imprimer('sectionAimprimer')">Imprimer</button>

    
   
        </form> 
        <div id='sectionAimprimer'>
    Résultat MySQL ou tableau HTML à imprimer
      </div>
    </div>
</div>
<?php } ?>