<?php 

include 'Mapper.php';



function jsonToPost($jsonObj){

		$obj = json_decode($jsonObj);
		$location = new Location;
		$location->setCity($obj->location->city);
		$location->setRegion($obj->location->region);
		$location->setAddress($obj->location->address);

		$mail = $obj->user_email;

		$dbHandler = new DatabaseHandler("localhost", "id1602709_admin", "admin", "id1602709_bulbodb");

		$sql = "SELECT userID from users where mail = '{$mail}';";

		$result = $dbHandler->executeQuery($sql);

		$row = $result->fetch_assoc();

		$userID = $row['userID'];
		echo $userID;
		echo "<br>";

		$post = new Post(NULL, $obj->title, $obj->description,$location , $obj->price, $userID, NULL, $obj->subcat_id, $obj->cat_id, NULL, NUll, $obj->photo_count, $obj->is_premium);

		return $post;
	}


	function postToJson($post){
		$jsonObj = json_encode($post);
		return $jsonObj;
	}

// $location2 = new Location;
// $location2->setCity("Tashkent");
// $location2->setRegion("Tashkent region");

// $post = new Post(NULL, "HELLO", "asdasd", $location2, 100, 4, 
// 				NULL, 3, 1, null, null, 1);



// $jobj = '{"title":"GRUGLALFD","description":"GRUGLALFDLFLLVLLLBLABLABLAGRUGLALFDLFLLVLLLBLABLABLA","location":{"city":"Qoqon","region":"Fergana region", "address": " Malikrabbod 13-kv"},"price":1002,"user_email":"sh0301@mail.ru","subcat_id":1,"cat_id":2,"is_premium":0, "photo_count": 6}';

// $post2 = jsonToPost($jobj);

// $mapper = new Mapper();

// $mapper->addPostToDBwithObj($post2);
// echo "ADDED";
// echo "<br>";
// // echo $post2
// echo "<pre>";
// print_r($post2);
// echo "</pre>";


 ?>