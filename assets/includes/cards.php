<?php

//fetch_data.php
var_dump($_GET);


include('../db/connectdb.php');	

if(isset($_GET["action"]))
{
	$query = "
	SELECT * FROM articles a, genres g, categories c, sous_categories sc WHERE a.id_genres = g.id_genres AND a.id_categories = c.id_categories AND a.id_sous_categories = sc.id_sous_categories 
	";
	if(isset($_GET["minimum_price"], $_GET["maximum_price"]) && !empty($_GET["minimum_price"]) && !empty($_GET["maximum_price"]))
	{
		$query .= "
		 AND a.prix_articles BETWEEN ".$_GET["minimum_price"]." AND ".$_GET["maximum_price"]."
		";
	}
	if(isset($_GET["brand"]))
	{
	
		$brand_filter =$_GET["brand"];
		$query .= "
		 AND a.id_genres IN(".$brand_filter.")
		";
	}
	if(isset($_GET["ram"]))
	{
		$ram_filter = $_GET["ram"];
		$query .= "
		 AND a.id_sous_categories IN(".$ram_filter.")
		";
		/* jjj */ 
		// var_dump($_GET["ram"]);
		// var_dump(explode(",", $_GET["ram"]));
		// $ram_filter = explode(",", $_GET["ram"]);

		


		// var_dump(explode(',',$ram_filter));
		// $query .= "
		//  AND a.id_sous_categories IN('".json_encode($ram_filter)."')
		// ";
	}
	if(isset($_GET["storage"]))
	{
		// $storage_filter = explode("','", $_GET["storage"]);
		// $arrayc= implode($storage_filter);
		// var_dump($arrayc);
		// // var_dump($test = "AND a.id_categories IN('".json_encode($storage_filter)."')");
		// var_dump(intval($arrayc));
		
		// $test =intval($storage_filter);
	

		$query .= "
		 AND a.id_categories IN(".$_GET["storage"].")
		";
		// var_dump($query);
	}
	
		$limit =$_GET["limit"];
	
	$statement =$db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_pag = $statement->rowCount();
	$nombre_page = ceil($total_pag/$limit);
	
	
	if(isset($_GET["page"]))
	{	
	
			$valref = ($limit*$_GET['page'])-$limit; 
			$query .= "LIMIT ".$valref.",".$limit."";
			$statement =$db->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			$total_row = $statement->rowCount();
			
			
		}
		
	$output = '';
	if($total_pag > 0)
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
					listes personnages : '. $row['nom_sous_categories'] .'
				 
					</p>
			
				</div>

			</div>
     
			';
		}
		$output .= '<div class="col-sm-2 col-lg-8 col-md-3">
		<ul class="pagination">
		<li class="page-item "><button class="page pag_selector " data-page="Precedent">Precedent</button></li>';

			for($i=1;$nombre_page >= $i ;$i++)
			{
					$output .= '
						<li class="page-item "><button class="page pag_selector " data-page="'. $i .'">'.$i.'</button></li>
					';
			}
		$output.='
				<li class="page-item "><button class="page pag_selector " data-page="Suivant">Suivant</button></li>
			</ul>
		</div>';
		$output.='<div class="col-sm-2 col-lg-8 col-md-3 limiter"> 
		<div class="hint-text">le limitateur est à <b>'.$limit.'</b> sur <b>334</b> resultat </div>
		<br>
		<br>
		<button class ="limit_selector " data-limit="5">5</button>    
		<button class ="limit_selector " data-limit="10">10</button>    
		<button class ="limit_selector " data-limit="20">20</button>    
		</div>
</div>';
		
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}


/*
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
     if(isset($_POST["page"]))
	 {
		// $limiter = '5';
	 	
	 	// $query .= "LIMIT '".$limt_filter."','".$limiter."'";
	}
	
	$statement =$db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$limiter = '5';
	$nombre_page = ceil($total_row/$limiter); 
	
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
					listes personnages : '. $row['nom_sous_categories'] .'
					
					</p>
					
					</div>
					
					</div>
					
					';
				}
				if($nombre_page > 0){
					$output .='<ul class="pagination">
					<li class="page-item disabled"><a href="#">Precedent</a></li>
					';
					for ($i = 1;$nombre_page >= $i;$i++) {
						$output .= '<li class="page-item "><button id="testpage" class="page">'.$i.'</button></li>';
					}
		
		$output .='<li class="page-item"><a href="" class="page-link">Suivant</a></li>
		</ul>';
		
	}
}
else
{
	$output = '<h3>No Data Found</h3>';
}

echo $output;
}
*/
?>

