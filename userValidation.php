<?php
require_once "DatabaseHandler.php";
require_once'holders/users.php';
require_once 'holders/informations.php';

function isValidUser($mail, $pwd){
    $dbHandler = new DatabaseHandler("localhost", "id1602709_admin", "admin", "id1602709_bulbodb");
	$password = md5($pwd);
	$sql = "SELECT * from users where mail = '{$mail}' AND psw = '$password'";

	$result = $dbHandler->executeQuery($sql);

	$row = $result->fetch_assoc();
    if(isset($row))
    {
        $loc = new Location;


        $loc->setCity($row['Location']);

        $user = new User($row['userID'], $row['firstName'], $row['lastName'],
            $row['warnings'], $loc, $row['registerDate'], $row['Contacts'], $row['mail'], $row['psw'],
            $row['isAdmin']);

        return $user;
    }else
        return false;

}
?>