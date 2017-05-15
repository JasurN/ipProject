<?php

// interface DB_handler
// {
// 	function conectToDB();
// 	function executeQuery($query);
// }

class DatabaseHandler //implements DB_handler
{
private $dbHost;
private $dbName;
private $dbUsername;
private $dbPassword;
private $tableName;
private $conn;

//This is a constructor for Database Handler
//You should pass Host Name, DB Name, DB Username,
//DB Password, Table name
public function __construct($dbHost, $dbName, $dbUsername, 
	$dbPassword){

	$this->connectToDB($dbHost, $dbName, $dbUsername, 
	$dbPassword);
}

public function connectToDB($dbHost, $dbName, $dbUsername, 
	$dbPassword){

// Create connection
	$this->setHostName($dbHost);
	$this->setDbName($dbName);
	$this->setDbUsername($dbUsername);
	$this->setDbPassword($dbPassword);
	$this->conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($this->conn->connect_error) {
    die("Connection failed: " . $this->conn->connect_error);
}
echo "Connected successfully";
}

public function setHostName($dbHost){
	$this->dbHost = $dbHost;
}
public function setDbName($dbName){
	$this->dbName = $dbName;
}

public function setDbUsername($dbUsername){
	$this->dbUsername = $dbUsername;
}

public function setDbPassword($dbPassword){
	$this->dbPassword = $dbPassword;
}

public function setTableName($tableName){
	$this->tableName = $tableName;
}

public function getHostName(){
	return $this->dbHost;
}

public function getDbName(){
	echo $this->dbName;
	return $this->dbName;
}

public function getDbUsername(){

	return $this->dbUsername;
}

public function getDbPassword(){
return $this->dbPassword;
}

public function getTableName(){
	return $this->tableName;
}

public function getConn(){
	return $this->conn;	
}

//This function connect to DB
//and return connection variable to calling
//place


//This function requres SQL query, DB connection
//then it executes query using connection
public function executeQuery($query){

$result = $this->conn->query($query);
//if($result->num_rows>0)
	return $result;
//else return NULL;
}

}

?>
