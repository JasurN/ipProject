<?php

// 1 - user creation into database
// 2  - validation
class User
{
    private $userID;
    private  $fname;
    private  $lname;
    private  $warnings;
    private  $location;
    //private  $posts;
    private  $registerDate;
    private  $isAdmin;
    //private  $pinned_posts;
    private  $contacts;
    private $mail;
    private $password;
    private $photo_count;

    public function __construct($userID, $fname, $lname, $warnings, $location, $registerDate, $contacts, $mail, $password,$isAdmin){
        $this->setInfo($userID, $fname, $lname, $warnings, $location, $registerDate, $contacts, $mail, $password, $isAdmin);

    }

    public function setPhotoCount($count)
    {
        $this->photo_count=$count;
    }
    public function getPhotoCount()
    {
        return $this->photo_count;
    }

    public function setInfo($userID, $fname, $lname, $warnings, $location, $registerDate, $contacts, $mail, $password, $isAdmin){
        $this->setUserID($userID);
        $this->setFname($fname);
        $this->setLname($lname);
        $this->setWarnings($warnings);
        $this->setLocation($location);
        $this->setRegDate($registerDate);
        $this->setContacts($contacts);
        $this->setMail($mail);
        $this->setPassword($password);
        $this->setIsAdmin($isAdmin);
    }

    public function setUserID($userID){
        $this->userID = $userID;
    }

    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    public function setWarnings($warnings)
    {
        $this->warnings = $warnings;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    // public function setPosts($posts)
    //     {
    //         $this->$posts = $posts;
    //     }

    public function setRegDate($registered_date)
    {
        $this->registered_date = $registered_date;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    // public function setPinPosts($pinned_posts)
    //     {
    //         $this->$pinned_posts = $pinned_posts;
    //     }

    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }


    public function getUserID(){
        return $this->userID;
    }

    public function getFname()
    {
        return $this->fname;
    }

    public function getLname()
    {
        return $this->lname;
    }

    public function getWarnings()
    {
        return $this->warnings;
    }

    public function getLocation()
    {
        return $this->location;
    }

    // public function getPosts()
    //    {
    //        return $posts;
    //    }

    public function getRegDate()
    {
        return $this->registered_date;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function getIsAdmin()
    {
        return $this->isAdmin;
    }



    // public function getPinPosts()
    //    {
    //        return $pinned_posts;
    //    }

    public function getContacts()
    {
        return $this->contacts;
    }


}
?>