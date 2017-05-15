<?php
	$username = $_REQUEST["username"];
	$password  = $_REQUEST["password"];  
	
	if(strlen($username)!=0 && strlen($password)!=0){
$connection = new mysqli("localhost", "id1602709_admin", "admin", "id1602709_bulbodb");

	}
	else{
		echo "You have entered wrong info"; 
		?> </br> <a href="login.php">Please go to login page</a>
		<?php
	}

if($connection->error){
	die("Connection failed: " .$connection->connect_error);
}
$sqlQuery = "SELECT * FROM adminuser WHERE username= '$username'";
$resultInfo = $connection->query($sqlQuery);
$x=false;
while($row= $resultInfo->fetch_assoc()){
	if($username==$row["username"]&& $password==$row["password"]){
		$x=true;
	}
}
mysqli_close($connection);
if($x==true){
header('Location: dashboard.html');
exit;

}else{
	echo $username;
	echo $password;
echo " it is here";
}

	?>