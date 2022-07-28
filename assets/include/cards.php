<?php

//fetch_data.php


include('../db/connectdb.php');

if(isset($_POST["action"]))
{
	$query = "
	SELECT * FROM articles a, genres g, categories c, sous_categories sc WHERE a.id_genres = g.id_genres AND a.id_categories = c.id_categories AND a.id_sous_categories = sc.id_sous_categories 
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND a.prix_articles BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND a.id_genres IN('".$brand_filter."')
		";
	}
	if(isset($_POST["ram"]))
	{
		$ram_filter = implode("','", $_POST["ram"]);
		$query .= "
		 AND a.id_sous_categories IN('".$ram_filter."')
		";
	}
	if(isset($_POST["storage"]))
	{
		$storage_filter = implode("','", $_POST["storage"]);
		$query .= "
		 AND a.id_categories IN('".$storage_filter."')
		";
	}
    // if(isset($_POST["limit"]))
	// {
	// 	$limit_filter = implode("','", $_POST["limit"]);
        
	// }
    $query .= "LIMIT 5 ";

	$statement =$db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<div class="col-sm-2 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
					<img src="'. $row['image1_articles'] .'" alt="" class="img-responsive" >
					<p align="center"><strong><a href="poster.php?id_article= '.$row['id_articles'].'">'. $row['nom_articles'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['prix_articles'] .'€</h4>
					<p>
					Genres : '. $row['nom_genres'] .' <br />
					Categories : '. $row['nom_categories'] .' <br />
					listes personnages : '. $row['nom_sous_categories'] .' </p>
				</div>

			</div>
     
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}?>
