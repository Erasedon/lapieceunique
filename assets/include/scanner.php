<?php

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


$request = new HttpRequest();
$request->setUrl('https://barcode-lookup.p.rapidapi.com/v3/products');
$request->setMethod(HTTP_METH_GET);

$request->setHeaders([
	'X-RapidAPI-Host' => 'barcode-lookup.p.rapidapi.com',
	'X-RapidAPI-Key' => 'fe712b4d1fmshdc341191def35eep1d0674jsn6013aa6ea166'
]);

try {
	$response = $request->send();

	echo $response->getBody();
} catch (HttpException $ex) {
	echo $ex;
}