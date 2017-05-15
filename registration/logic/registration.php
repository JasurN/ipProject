<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/olx/json_converter.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/olx/Mapper.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/olx/DatabaseHandler.php');

$echo = $_SERVER['DOCUMENT_ROOT'].'/holders/users.php';
if($user_str = json_decode(file_get_contents('php://input')))
{
    $sadfd = $user_str->email;
    $user = new User("","","","","","","","","","");
    $user = jsonToUser($user_str);
    $user->setRegDate(date("d/m/YY"));
    $mapper = new Mapper();
    $mapper->addUserToDBwtihObj($user);
    echo "success";
}
else
{
    echo "failed";
}
?>