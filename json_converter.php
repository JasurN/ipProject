<?php
require_once 'holders/users.php';
require_once 'holders/informations.php';
function jsonToUser($json_user)
{
    $user_object = new User("","","","","","","","","","");
    $contact = new Contacts;
    $location = new Location;

    $contact->setEmail($json_user->email);
    $contact->setTelephone($json_user->phone);

    $location->setCountry($json_user->country);
    $location->setCity($json_user->city);

    $user_object->setFname($json_user->fname);
    $user_object->setLname($json_user->lname);
    $user_object->setContacts($contact);
    $user_object->setLocation($location);
    $user_object->setPassword($json_user->password);
    return $user_object;
}

function jsonToPost($json_post)
{
    
}