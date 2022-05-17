<div class="categorie-tb">

<?php
                if ((isset($_GET['genress'])) && (empty($_GET['sous_cat2'])))
                {
                    $branchecked = [];
                    $branchecked = $_GET['genress'];
                    foreach($branchecked as $rowbrand)
                    {
                        $products = "SELECT * FROM articles WHERE id_genres IN ($rowbrand) AND prix_articles <= ".$_GET['prix3']."";
                        $products_run = mysqli_query($con, $products);
                        if(mysqli_num_rows($products_run) > 0)
                        {
                            foreach($products_run as $proditems) :
                                ?>
<div class="test-tb">
    <div class="border">
        <a href="poster.php?id_article=<?= $proditems['id_articles'];?>">
            <ul>
                <li><img src="assets/img/<?= $proditems['image1_articles']; ?>"></li>
                <li>
                    <h6><?= $proditems['nom_articles']; ?></h6>
                </li>
                <li>
                    <h6><?= $proditems['prix_articles']; ?>€</h6>
                </li>
            </ul>
        </a>
    </div>
</div>
<?php
                            endforeach;
                        }
                    
                }
                }


                if ((empty($_GET['genress'])) && (isset($_GET['sous_cat2'])))
                {
                    $branchecked = [];
                    
                    $branchecked2 = $_GET['sous_cat2'];
                    // foreach($branchecked as $rowbrand)
                    // {
                        foreach($branchecked2 as $rowbrand2)
                    {

                        $products = "SELECT * FROM articles WHERE id_sous_categories IN ($rowbrand2) AND prix_articles <= ".$_GET['prix3']."";
                        $products_run = mysqli_query($con, $products);
                        if(mysqli_num_rows($products_run) > 0)
                        {
                            foreach($products_run as $proditems) :
                                ?>
<div class="test-tb">
    <div class="border">
        <a href="poster.php?id_article=<?= $proditems['id_articles'];?>">
            <ul>
                <li><img src="assets/img/<?= $proditems['image1_articles']; ?>"></li>
                <li>
                    <h6><?= $proditems['nom_articles']; ?></h6>
                </li>
                <li>
                    <h6><?= $proditems['prix_articles']; ?>€</h6>
                </li>
            </ul>
        </a>
    </div>
</div>
<?php
                            endforeach;
                        }
                        
                    
                }
                }



                if ((isset($_GET['genress'])) && (isset($_GET['sous_cat2'])))
                {
                    $branchecked = [];
                    $branchecked = $_GET['genress'];
                    $branchecked2 = $_GET['sous_cat2'];
                    // $branchecked3 = $_GET['prix3'];
                    foreach($branchecked as $rowbrand)
                    {
                        foreach($branchecked2 as $rowbrand2)
                    {
              

                        $products = "SELECT * FROM articles WHERE id_genres IN ($rowbrand) AND id_sous_categories IN ($rowbrand2) AND prix_articles <= ".$_GET['prix3']."";
                        $products_run = mysqli_query($con, $products);
                        if(mysqli_num_rows($products_run) > 0)
                        {
                            foreach($products_run as $proditems) :
                                ?>
<div class="test-tb">
    <div class="border">
        <a href="poster.php?id_article=<?= $proditems['id_articles'];?>">
            <ul>
                <li><img src="assets/img/<?= $proditems['image1_articles']; ?>"></li>
                <li>
                    <h6><?= $proditems['nom_articles']; ?></h6>
                </li>
                <li>
                    <h6><?= $proditems['prix_articles']; ?>€</h6>
                </li>
            </ul>
        </a>
    </div>
</div>
<?php
                            endforeach;
                        }
                    
                }
                }
                }
                
                if ((empty($_GET['genress'])) && (empty($_GET['sous_cat2'])) && (empty($_GET['genres'])))
                {

                    // $branchecked3 = $_GET['prix3'];

              

                        $products = "SELECT * FROM articles WHERE prix_articles <= ".$_GET['prix3']."";
                        $products_run = mysqli_query($con, $products);
                        if(mysqli_num_rows($products_run) > 0)
                        {
                            foreach($products_run as $proditems) :
                                ?>
<div class="test-tb">
    <div class="border">
        <a href="poster.php?id_article=<?= $proditems['id_articles'];?>">
            <ul>
                <li><img src="assets/img/<?= $proditems['image1_articles']; ?>"></li>
                <li>
                    <h6><?= $proditems['nom_articles']; ?></h6>
                </li>
                <li>
                    <h6><?= $proditems['prix_articles']; ?>€</h6>
                </li>
            </ul>
        </a>
    </div>
</div>
<?php
                            endforeach;
                        }
              
                }
            ?>
            


<!-- CATEGORIE SANS FILTRE -->
<?php

    
if (isset($_GET['genres'])){

foreach ($requete as $row)
{
    
    
?>

<div class="categorie-1">

    <ul>
        <a href="poster.php?id_article=<?php echo $row['id_articles'];?>">
            <li><img src="assets/img/<?php echo $row['image1_articles'];?>" alt=""></li>
            <li>
                <?php
            echo $row['nom_articles'];
            ?>
            </li>
            <!-- <li>COULEUR</li> -->
            <li>
                <?php
            echo $row['prix_articles'];
            ?>€</li>
        </a>
    </ul>
</div>
<?php
}
}
// else {echo "Aucun article trouvé";}
?>
</div>
</div>
</div>