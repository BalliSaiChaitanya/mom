<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method=="POST"){
	$requestBody=file_get_contents('php://input');
	$json=json_decode($requestBody);
	$flavor=$json->queryResult->parameters->flavor;
	$response=new \stdClass();

	
	$rec=json_decode(file_get_contents('https://raw.githubusercontent.com/mombotic/mom/master/data.json'));
	

	switch ($flavor) {
		case "healthy":
			$speech="I would suggest ".$rec->healthy;
			break;
		case "signature":
			$speech="I would suggest ".$rec->signature;
			break;
		case "fruit":
			$speech="I would suggest ".$rec->fruit;
			break;
		case "american classic":
			$speech="I would suggest ".$rec->american;
			break;
		case "premium":
			$speech="I would suggest ".$rec->premium;
			break;
		case "frappe":
			$speech="I would suggest ".$rec->frappe;
			break;
		case "banana":
			$speech="I would suggest ".$rec->banana;
			break;
		case "special":
			$speech="I would suggest ".$rec->special;
			break;
		case "cookies":
			$speech="I would suggest ".$rec->cookies;
			break;
		default:
			$speech="I am afraid we dont have any such type available.Try something else.";
			break;
	}


	$response->fulfillmentText=$speech;
	$response->source="webhook";
	echo json_encode($response);
}else{
	echo "method not allowed";
}

?>
