<?php

// $method = $_SERVER['REQUEST_METHOD'];

// if($method=="POST"){
// 	$requestBody=file_get_contents('php://input');
// 	$json=json_decode($requestBody);
// 	$text=$json->result->parameters->text;
// 	$flavor=$json->result->parameters->flavor;
// 	$response=new \stdClass();



	$curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, 'https://github.com/mombotic/mom/blob/sub/data.json');
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    $rec = json_decode(curl_exec($curlSession));
    curl_close($curlSession);
	echo "Hello this is test";
	
	

// 	switch ($flavor) {
// 		case "fruits":
// 			$speech="I would like you to try ".$rec->fruits;
// 			break;
// 		case "chocolate":
// 			$speech="I would like you to try ".$rec->chocolate;
// 			break;
// 		default:
// 			$speech="Try oreo";
// 			break;
// 	}


// 	$response->speech=$speech;
// 	$response->displayText=$speech;	
// 	$response->source="webhook";
// 	echo json_encode($response);
// }else{
// 	echo "method not allowed";
// }

?>
