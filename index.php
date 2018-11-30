<?php
$servername = "192.168.64.145";
$username = "innovationcenter";
$password = "innovation123$$";
$dbname = "innovationcenter_mom";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
	$method = $_SERVER['REQUEST_METHOD'];
if($method=="POST"){
	$requestBody=file_get_contents('php://input');
	$json=json_decode($requestBody);
	$text=$json->result->parameters->text;
	$flavor=$json->result->parameters->flavor;
	$response=new \stdClass();
	
	$sql="select * from suggestions where cat = ".$flavour."";
    $query=mysqli_query($con,$query);
    $speec=" ";
    while($row=mysqli_fetch_array($sql))
    {
        $speec =$speec." ".$row['name'];
    }
    $speech=$speec;
    

    $response->speech=$speech;
	$response->displayText=$speech;	
	$response->source="webhook";
	echo json_encode($response);
}
else{
	echo "method not allowed";
}

    
?>
