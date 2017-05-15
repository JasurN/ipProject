<?php
include 'DatabaseHandler.php';
include 'posts.php';
include 'informations.php';


class Filtrator{

private $dbHandler;

public function __construct($dbHost, $dbName, $dbUsername, $dbPassword){
	$this->dbHandler = new DatabaseHandler($dbHost, $dbName, $dbUsername, $dbPassword);
}



public function getFiltredData($region, $catID, $subCatID, $byPrice, $byDate){
	$temp = $this->getFiltredDataByRegion($region, $catID, $byPrice, $byDate);
	$a = array();
	$i = 0;

	while($i<count($temp)){
		if($temp[$i]->getSubCatID()==$subCatID){
			$a = array_pad($a, count($a)+1, $temp[$i]);
		}
		$i++;
	}

	return $a;
}


public function getFiltredDataByCat($region, $catID, $byPrice, $byDate){
	$temp = $this->getFiltredDataByRegion($region, $byPrice, $byDate);
	$a = array();
	$i = 0;

	while($i<count($temp)){
		if($temp[$i]->getCatID()==$catID){
			$a = array_pad($a, count($a)+1, $temp[$i]);
		}
		$i++;
	}

	return $a;
}


public function getFiltredDataByRegion($region, $byPrice, $byDate){
 // if(is_null($region)) $region="%";
 // else
  $region.="%";
  if($byDate == 1) $sql  = "SELECT * from posts where region LIKE '{$region}' order by postDate DESC";
  else $sql  = "SELECT * from posts where region LIKE '{$region}' order by price";

$result = $this->dbHandler->executeQuery($sql);

$a = array();

while($row = $result->fetch_assoc()){
	$loc = new location;
	$loc->setCity($row['city']);
	$loc->setRegion($row['region']);
	$post = new Post($row['postID'], $row['title'], $row['Description'], $loc , $row['price'], 
	$row['userID'], NULL, $row['subCatID'], $row['catID'], NULL, $row['postDate'], $row['photoCount'], False);
	$a = array_pad($a, count($a)+1, $post);
}

 return $a;
}


public function sortByDate($subCatName){
$q1 = "SELECT subCatID from subcategories where subcatname='{$subCatName}'";

$result = $this->dbHandler->executeQuery($q1);

$row = $result->fetch_assoc();

$subCatID = $row['subCatID'];


$query = "SELECT * from posts where subCatID = '{$subCatID}' ORDER BY postDate DESC";//asc or desc

$result = $this->dbHandler->executeQuery($query);

return $result;
}

public function sortByPrice($subCatName){
$q1 = "SELECT subCatID from subcategories where subcatname='{$subCatName}'";

$result = $this->dbHandler->executeQuery($q1);

$row = $result->fetch_assoc();

$subCatID = $row['subCatID'];


$query = "SELECT * from posts where subCatID = '{$subCatID}' ORDER BY price DESC";

$result = $this->dbHandler->executeQuery($query);

return $result;
}

}

// $f = new Filtrator("localhost", "bullbo", "root", '');

// // $result = $f->sortByDate("Flats");
// // $i = 1;
// // while($row = $result->fetch_assoc()){
// //   echo $i++ . " - " . $row['price'];
// //   echo "<br>";
// // }
// //$f->
// echo "<pre>";
// echo print_r($f->getFiltredDataByRegion("", 0, 1));
// echo "</pre>";
// ?>