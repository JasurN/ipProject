<?php
require_once 'holders/posts.php';
require_once 'ImageHandler.php';
require_once 'holders/users.php';
require_once 'holders/informations.php';

class Mapper{

	private $imgHandler;
	private $dbHandler;

	public function __construct(){
		$this->imgHandler = new ImageHandler("localhost", "id1602709_admin", "admin", "id1602709_bulbodb");
		$this->dbHandler = new DatabaseHandler("localhost", "id1602709_admin", "admin", "id1602709_bulbodb");

	}

// 	public function addPostToDB($title, $description, $location,
//         $price, $userID, $subCatID, $catID, $postDate, $numOfPic){

// $loc = json_decode($location);

// 		$sql = "INSERT INTO `posts` (`postID`, `title`, `Description`, `catID`, `subCatID`, `price`, `userID`, `postDate`, 'location')
// 		VALUES (NULL, '{$title}', '{$description}', '{$catID}', '{$subCatID}', '{$price}', '{$userID}', '{$postDate}', '{$loc}');";

// 		$this->dbHandler->executeQuery($sql);

// 		$lastID = $this->dbHandler->getConn()->insert_id;

// 		for($i=0; $i<$numOfPic;$i++) $this->imgHandler->setImgPost($lastID);
// 	}

	public function addPostToDBwithObj($post){

		$title = $post->getTitle();
		$description = $post->getDescription();
		$catID = $post->getCatID();
		$subCatID = $post->getSubCatID();
		$price = $post->getPrice();
		$userID = $post->getUserID();
		$postDate = $post->getPostDate();
		$numOfPics = $post->getNumOfPics();
		$city = $post->getLocation();
        $city = $city->getCity();
		$region = $city;
        $address = $city;
        $res = $this->dbHandler->executeQuery("select * from users where mail='$userID'");
        $row = $res->fetch_assoc();
        $userID = $row["userID"];

		// $sql = "INSERT INTO `posts` (`postID`, `title`, `Description`, `catID`, `subCatID`, `price`, `userID`, `postDate`, 'city', 'region', 'address', 'photoCount')
		// VALUES (NULL, '{$title}', '{$description}', '{$catID}', '{$subCatID}', '{$price}', '{$userID}', '{$postDate}', '{$city}', '{$region}', '{$address}', {$numOfPics});";

		$sql = "INSERT INTO `posts` (`postID`, `title`, `Description`, `catID`, `subCatID`, `price`, `userID`, `postDate`, `city`, `region`, `photoCount`, `address`) VALUES
							(NULL, '{$title}', '{$description}', '{$catID}', '{$subCatID}', '{$price}', '{$userID}', CURRENT_TIMESTAMP, '{$city}', '{$region}', '{$numOfPics}', '{$address}');";

		$this->dbHandler->executeQuery($sql);

		$lastID = $this->dbHandler->getConn()->insert_id;

		for($i=0; $i<$numOfPics;$i++) $this->imgHandler->setImgPost($lastID);
	}


	public function addUserToDBwtihArgs($fname, $lname, $warnings, $location
								, $contacts, $isAdmin, $mail, $password){
		$encrPsw = md5($password);

		$sql = "INSERT INTO `users` (`userID`, `firstName`, `lastName`, `Location`, `Contacts`, `isAdmin`, `registerDate`, `warnings`, `mail`, `psw`) VALUES (NULL, '{$fname}', '{$lname}', '{$location}', '{$contacts}', '{$isAdmin}', CURRENT_TIMESTAMP, '{$warnings}', '{$mail}', '{$encrPsw}');";
		//echo "<br>" . $sql;
		$this->dbHandler->executeQuery($sql);
		//echo "IS IT WORKING?";
	}

	public function addUserToDBwtihObj($user){
		$encrPsw = md5($user->getPassword());
        $location = $user->getLocation();
        $contacts = $user->getContacts();
        $city = $location->getCity();
        $phone = $contacts->getTelephone();
        $email = $contacts->getEmail();

		$sql = "INSERT INTO `users` (`userID`, `firstName`, `lastName`, `Location`, `Contacts`, `isAdmin`, `registerDate`, `warnings`, `mail`, `psw`) VALUES (NULL, '{$user->getFname()}', '{$user->getLname()}', '{$location->getCity()}', '{$contacts->getTelephone()}', '{$user->getIsAdmin()}', CURRENT_TIMESTAMP, '{$user->getWarnings()}', '{$contacts->getEmail()}', '{$encrPsw}');";
        echo "";
		//echo "<br>" . $sql;
		$this->dbHandler->executeQuery($sql);
		//echo "IS IT WORKING?";
	}


	public function getUserFromDB($mail){
		$sql = "SELECT * from users where mail = '{$mail}'";

		$result = $this->dbHandler->executeQuery($sql);

		$row = $result->fetch_assoc();

    	 $user = new User($row['userID'], $row['firstName'], $row['lastName'], $row['warnings'], $row['Location'], $row['registerDate'], $row['Contacts'], $row['mail'], $row['psw'], $row['isAdmin']);

		return $user;
	}



	public function getPostFromDB($postID){

		$sql = "SELECT * from posts where postID={$postID}";

		$result = $this->dbHandler->executeQuery($sql);

		$row = $result->fetch_assoc();

		$post = new Post($postID, $row['title'], $row['Description'], $row['location'],
				$row['price'], $row['userID'], NULL, $row['subCatID'], $row['catID'], NULL,
				$row['postDate']);

		return $post;
	}

    public function jsonToPost($json_post_str)
    {
        $json_post = json_decode($json_post_str);
        $location = new Location();
        $location->setCity($json_post->region);
        $post = new Post("","","","","","","","","","","","","");
        $post->setCatID($json_post->cat_id);
        $post->setDescription($json_post->description);
        $post->setTitle($json_post->title);
        $post->setPrice($json_post->price);
        $post->setLocation($location);
        $post->setSubCatID($json_post->subcat_id);
        $post->setUserID($json_post->user_name);
        $post->setNumOfPics($json_post->photo_count);

        return $post;

    }
}




// 	$usr->setLname("Urmanov");
// 	$usr->setFname("Shakhobiddin");

// 	$mapper->addUserToDBwtihObj($usr);
// 	echo "ADDED!!";


// echo "5d41402abc4b2a76b9719d911017c592";
// echo "<br>";
// echo md5("hello");
// echo "<br>";
// echo md5("hello");
// echo "<br>";
// echo md5("MYNAME_IS_hello");
// echo "<br>";
// echo md5("hello");
// //$post = new Post(12, "1231", "sdfsdf", );


?>
