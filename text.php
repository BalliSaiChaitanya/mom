<?php
$servername = "192.168.64.145";
$username = "innovationcenter";
$password = "innovation123$$";
$dbname = "innovationcenter_mom";
//Create connection
$con = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$sql="select * from suggestions";
	$result = $conn->query($sql);
 //    $query=mysqli_query($con,$query);
 //    $speec=" ";
 //    while($row=mysqli_fetch_array($sql))
 //    {
 //        $speec =$speec." ".$row['name'];
 //    }
 //    $speech=$speec;
	echo $result;

?>