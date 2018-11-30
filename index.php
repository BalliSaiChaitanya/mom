<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method=="POST"){
	$requestBody=file_get_contents('php://input');
	$json=json_decode($requestBody);
	$text=$json->result->parameters->text;
	$flavor=$json->result->parameters->flavor;
	$response=new \stdClass();



	$rec=json_decode(file_get_contents('https://github.com/mombotic/mom/blob/master/data.json'));

	switch ($flavor) {
		case "fruits":
			$speech=echo "I would like you to try ".$rec->fruits;
			break;
		case "chocolate":
			$speech=echo "I would like you to try ".$rec->chocolate;
			break;
		default:
			$speech="Try oreo";
			break;
	}


	$response->speech=$speech;
	$response->displayText=$speech;	
	$response->source="webhook";
	echo json_encode($response);
}else{
	echo "method not allowed";
}

?>
