<?php
include 'assets/include/traitement/traitementscanner.php';
// $client = new http\Client;
// $request = new http\Client\Request;

// $request->setRequestUrl('https://barcode-lookup.p.rapidapi.com/v3/products');
// $request->setRequestMethod('GET');
// $request->setHeaders([
// 	'X-RapidAPI-Host' => 'barcode-lookup.p.rapidapi.com',
// 	'X-RapidAPI-Key' => 'fe712b4d1fmshdc341191def35eep1d0674jsn6013aa6ea166'
// ]);

// $client->enqueue($request)->send();
// $response = $client->getResponse();

// echo $response->getBody();


// $request = new HttpRequest();
// $request->setUrl('https://barcode-lookup.p.rapidapi.com/v3/products');
// $request->setMethod(HTTP_METH_GET);

// $request->setHeaders([
// 	'X-RapidAPI-Host' => 'barcode-lookup.p.rapidapi.com',
// 	'X-RapidAPI-Key' => 'fe712b4d1fmshdc341191def35eep1d0674jsn6013aa6ea166'
// ]);

// try {
// 	$response = $request->send();

// 	echo $response->getBody();
// } catch (HttpException $ex) {
// 	echo $ex;
// }

?>

<div class="container">
    <div class="inscription">
        <h3>Scanner :</h3>

        <div class="error"></div>

        <form method="post" action="assets/includes/db/traitementins.php" id="formajax">
            <div class="model_un">
				<div class="nom">
					<label for="">Code barre :</label>
                    <input type="text" name="cb" required>
                </div>

            <div class="model_deux">
                <label for=""></label>
                <input type="file" name="ci" required>
            </div>
			</div>
          
            <div class="model_deux">
                <label for=""></label>
            
            </div>
            <input type="submit" class="sub" value="Valider">
        </form>
    </div>
</div>