<?php 
    include 'assets/db/connectdb.php'; 

if ((!empty($_GET['id_article'])))
{
    $sql = "SELECT * FROM articles a, genres g, categories c, sous_categories sc WHERE id_articles = :id_articles";
    $prepare = $db->prepare($sql);   
    $prepare ->execute(array(':id_articles' => $_GET['id_article']));
    $result = $prepare->fetch();


  
    
    $reqgenres = "SELECT * FROM genres";
    $preparegenres = $db->prepare($reqgenres);   
    $preparegenres ->execute();
    $resultgenres = $preparegenres->fetchALL();

    $reqsouscat = "SELECT * FROM sous_categories";
    $preparesouscat = $db->prepare($reqsouscat);   
    $preparesouscat ->execute();
    $resultsouscat = $preparesouscat->fetchALL();

    $reqcat = "SELECT * FROM categories";
    $preparecat = $db->prepare($reqcat);   
    $preparecat ->execute();
    $resultcat = $preparecat->fetchALL();
?>

<div class="container">
    <div class="inscription">
        <h3> Modifier le poster :</h3>

        <div class="error"></div>

        <form method="post" action="assets/includes/traitement/traitementmod.php?id_articles=<?php echo $result['id_articles'] ?>" id="formajax">
            <div class="model_deux">
                <label for="">Nom du Produit:</label>
                <input type="text" name="nomap" value="<?php echo $result['nom_articles'] ?>" required>

            </div>
            <div class="model_deux">
                <label for="">Hauteur :</label>
                <input type="text" name="hauteurap" value="<?php echo $result['hauteur_articles'] ?>" required>
            </div>

            <div class="model_deux">
                <label for="">Largeur :</label>
                <input type="text" name="largeurap" value="<?php echo $result['largeur_articles'] ?>" required>
            </div>
            <div class="model_deux">
                <label for="">Prix :</label>
                <input type="text" name="Prixap" value="<?php echo $result['prix_articles'] ?>" required>
            </div>
            <div class="model_deux">
                <label for="">Description :</label>
                <input type="text" name="Descriptionap" value="<?php echo $result['description_articles'] ?>" required>
            </div>
            <div class="model_deux">
                <label for="">Quantité :</label>
                <input type="text" name="Quantite" value="<?php echo $result['quantite_articles'] ?>" required>
            </div>
            <div class="row g-3">
            <div class="col-md">
                    <div class="form-floating">
                        <select name="selgenres" class="form-select" id="floatingSelectGrid">
                            <option >liste des genres</option>
                            <?php
                            
                           
                            foreach ($resultgenres as $row) {
                                if($result['nom_genres'] === $row['nom_genres']){
                                
                                ?>
                                    <option value="<?php echo $row['id_genres'] ?>" selected><?php echo $row['nom_genres'] ?></option>
                                <?php
                                }
                                ?>
                                <option value="<?php echo $row['id_genres'] ?>"><?php echo $row['nom_genres'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelectGrid">liste des genres</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select name="selcat" class="form-select" id="floatingSelectGrid">
                           
                            <option >liste des categories</option>
                            <?php
                            foreach ($resultcat as $row) {
                                if($result['nom_categories'] === $row['nom_categories']){
                                
                                    ?>
                                        <option value="<?php echo $row['id_categories'] ?>" selected><?php echo $row['nom_categories'] ?></option>
                                    <?php
                                    }
                                    ?>
                                
                                <option value="<?php echo $row['id_categories'] ?>"><?php echo $row['nom_categories'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelectGrid">listes des categories</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select name="selsouscat" class="form-select" id="floatingSelectGrid">
                            <option >liste des sous_categories</option>
                            <?php
                         
                            foreach ($resultsouscat as $row) {
                                if($result['nom_sous_categories'] === $row['nom_sous_categories']){
                                
                                    ?>
                                        <option value="<?php echo $row['id_sous_categories'] ?>" selected><?php echo $row['nom_sous_categories'] ?></option>
                                    <?php
                                    }
                                    ?>
                                <option value="<?php echo $row['id_sous_categories'] ?>"><?php echo $row['nom_sous_categories'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelectGrid">listes des sous_categories</label>
                    </div>
                </div>
            </div> 
            <div class="model_deux">
               
               </div>
             <div class="row g-2">
            <div class="col-md">
                    <div class="form-floating">
                         <a id="startButton"><button class="btn btn-outline-secondary" type="button">Start</button></a>
                        <a  id="resetButton"><button class="btn btn-outline-secondary" type="button">  Reset</button></a>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                            <div id="sourceSelectPanel" style="display:none">
                                 <label for="sourceSelect">Change video source:</label>
                                 <select id="sourceSelect" style="max-width:400px">
                                </select>
                            </div>
                    </div>
                </div>
            </div>
            <div>
                <label for="">Code barre :</label>          
                <input type="text" id="result" name="barretxtap"  required>
           </div>

            <div class="model_deux">    
                <video id="video" style="border: 1px solid gray; max-width:250px"></video>
            </div>    
           
           <div class="model_deux">
               
            </div>
            <input type="submit" class="sub" value="Enregistrer">
            <button type="submit" class="sub">
                <a style="text-decoration: none" href="poster.php?id_article=<?php echo $result['id_articles'] ?>"><i
                        class='fa-solid fa-bag-shopping'></i> Retour </a>
            </button>
        </form>
    </div>
</div>
<?php
}else{
    
    $reqgenres = "SELECT * FROM genres";
    $preparegenres = $db->prepare($reqgenres);   
    $preparegenres ->execute();
    $resultgenres = $preparegenres->fetchALL();

    $reqsouscat = "SELECT * FROM sous_categories";
    $preparesouscat = $db->prepare($reqsouscat);   
    $preparesouscat ->execute();
    $resultsouscat = $preparesouscat->fetchALL();

    $reqcat = "SELECT * FROM categories";
    $preparecat = $db->prepare($reqcat);   
    $preparecat ->execute();
    $resultcat = $preparecat->fetchALL();

?>
<div class="container">
    <div class="inscription">
        <h3> D'ajout de poster :</h3>

        <div class="error"></div>

        <form method="post" action="assets/includes/traitement/traitementajout.php" id="formajax">
            <div class="model_deux">
                <label for="">Nom du Produit:</label>
                <input type="text" name="nomap" required>

            </div>
            <div class="model_deux">
                <label for="">Hauteur :</label>
                <input type="text" name="hauteurap" required>
            </div>
            <div class="model_deux">
                <label for="">Largeur :</label>
                <input type="text" name="largeurap" required>
            </div>
            <div class="model_deux">
                <label for="">Prix :</label>
                <input type="text" name="Prixap" required>
            </div>
            <div class="model_deux">
                <label for="">Description :</label>
                <input type="text" name="Descriptionap" required>
            </div>
            <div class="model_deux">
                <label for="">Quantité :</label>
                <input type="text" name="Quantite" required>
            </div>

            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <select name="selgenres" class="form-select" id="floatingSelectGrid">
                            <option selected>liste des genres</option>
                            <?php
                            
                            foreach ($resultgenres as $row) {
                                ?>
                                <option value="<?php echo $row['id_genres'] ?>"><?php echo $row['nom_genres'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelectGrid">liste des genres</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select name="selcat" class="form-select" id="floatingSelectGrid">
                            <option selected>listes des categories</option>
                            <?php
                            foreach ($resultcat as $row) {
                                ?>
                                <option value="<?php echo $row['id_categories'] ?>"><?php echo $row['nom_categories'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelectGrid">listes des categories</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select name="selsouscat" class="form-select" id="floatingSelectGrid">
                            <option selected>liste des sous_categories</option>
                            <?php
                         
                            foreach ($resultsouscat as $row) {
                                ?>
                                <option  value="<?php echo $row['id_sous_categories'] ?>"><?php echo $row['nom_sous_categories'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelectGrid">listes des sous_categories</label>
                    </div>
                </div>
            </div>
            <div class="model_un">
                <div class="nom">
                    <label for="">Code barre :</label>
                    <!-- <input type="file" name="cbpap" required> -->
                    <input type="file" name="file"  class="form-control" id="file_browser">
                </div>
                <div class="prenom">
                    <label for="">Code barre :</label>
                    <input type="text" name="barretxtap" required>
                </div>
            </div>


            <div class="model_deux">
                <label for=""></label>

            </div>
            <input type="submit" class="sub" value="Enregistrer">
        </form>
    </div>
</div>

<?php } ?>