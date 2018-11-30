<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method=="POST"){
	$requestBody=file_get_contents('php://input');
	$json=json_decode($requestBody);
	$text=$json->result->parameters->text;
	$flavor=$json->result->parameters->flavor;
	$response=new \stdClass();



	$rec=json_decode(file_get_contents("http://innovationcenter.gitam.edu/test3/interaction/data.json"));
	
	

	switch ($flavor) {
		case "fruits":
			$speech="I would like you to try ".$rec->fruits;
			break;
		case "chocolate":
			$speech="I would like you to try ".$rec->chocolate;
			break;
		default:
			$speech="Try oreo";
			break;
	}


	$response->speech=$speech;
	$response->displayText=$speech;	
	$response->source="webhook";
	echo json_encode($result);
}else{
	echo "method not allowed";
}

?>
