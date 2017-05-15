<?php 
include 'DatabaseHandler.php';

class ImageHandler{


private $dbHandler;

public function __construct($dbHost, $dbName, $dbUsername, $dbPassword){
	$this->dbHandler = new DatabaseHandler($dbHost, $dbName, $dbUsername, $dbPassword);
}


public function getImgPost($postID){

$sql = "SELECT imageName FROM images WHERE postID = '{$postID}'";

$result = $this->dbHandler->executeQuery($sql);
return $result;
}


public function setImgPost($postID){

$q1 = "SELECT COUNT(postID) from images where postID = '{$postID}'";
$row = $this->dbHandler->executeQuery($q1);
//$n = $row['postID'] + 1;

// echo "<br>";
// echo var_dump($row);
// echo "<br>";
list($count) = $row->fetch_row();
$count++;

 $strPart = "'{$postID}-{$count}');";
echo $strPart;
$sql = "INSERT INTO `images` (`imageID`, `postID`, `imageName`) VALUES (NULL, {$postID}," . $strPart;
//$sql = "INSERT INTO `images` (`imageID`, `postID`, `imageName`) VALUES (NULL, 2, '2-4')";
$this->dbHandler->executeQuery($sql);

}

public function getDbHandler(){
	return $this->dbHandler;
}
// public function getImgSubCat($subCatID){

// }

}
?>