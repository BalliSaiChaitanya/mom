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
			$speech="I would like you to try ".$rec->healthy;
			break;
		case "signature":
			$speech="I would like you to try ".$rec->signature;
			break;
		case "fruit":
			$speech="I would like you to try ".$rec->fruit;
			break;
		case "american classic":
			$speech="I would like you to try ".$rec->american;
			break;
		case "premium":
			$speech="I would like you to try ".$rec->premium;
			break;
		case "frappe":
			$speech="I would like you to try ".$rec->frappe;
			break;
		case "banana":
			$speech="I would like you to try ".$rec->banana;
			break;
		case "special":
			$speech="I would like you to try ".$rec->special;
			break;
		case "cookies":
			$speech="I would like you to try ".$rec->cookies;
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
