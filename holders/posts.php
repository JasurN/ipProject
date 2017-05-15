<?php
class Post
{
    public $postID;
    public $title;
    public $description;
    public $location;
    public $price;
    //public $is_premium; //bool?
    public $userID;
    public $reports;
    public $subCatID;
    public $catID;
    public $tags;
    public $postDate;
    public $numOfPics;

    // public function __construct(){

    // }   

    public function __construct($postID, $title, $description, $location, 
        $price, $userID, $reports, $subCatID, $catID, $tags,
        $postDate, $numOfPics,$is_premium=False){
       
        $this->setInfo($postID, $title, $description, $location, 
        $price,$userID, $reports, $subCatID, $catID, $tags,
        $postDate, $numOfPics, $is_premium);
    }

    public function setInfo($postID, $title, $description, $location, 
        $price, $userID, $reports, $subCatID, $catID, $tags,
        $postDate, $numOfPics, $is_premium){
     $this->setPostID($postID);
     $this->setTitle($title);
     $this->setDescription($description);
     $this->setLocation($location);
     $this->setPrice($price);
     $this->setIsPremium($is_premium);
     $this->setUserID($userID);
     $this->setReport($reports);
     $this->setSubCatID($subCatID);
     $this->setCatID($catID);
     $this->setTags($tags);
     $this->setNumOfPics($numOfPics);
     $this->setPostDate($postDate);
    }

    public function setPostID($id){
        $this->postID = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    // public function setIsPremium($is_premium)
    // {
    //     $this->is_premium = $is_premium;
    // }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function setReport($reports)
    {
        $this->reports = $reports;
    }

    public function setIsPremium($isPremium){
        $this->isPremium = $isPremium;

    }

    public function setSubCatID($subcategory)
    {
        $this->subcategory = $subcategory;
    }

    public function setCatID($category)
    {
        $this->category = $category;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function setPostDate($post_date)
    {
        $this->post_date = $post_date;
    }

     public function setNumOfPics($numOfPics){
        $this->numOfPics = $numOfPics;
    }

   public function getPostID(){
        return $this->postID;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getIsPremium()
    {
        return $this->isPremium;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getReports()
    {
        return $this->reports;
    }

    public function getSubCatID()
    {
        return $this->subcategory;
    }

    public function getCatID()
    {
        return $this->category;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function getPostDate()
    {
        return $this->post_date;
    }

    public function getNumOfPics(){
        return $this->numOfPics;
    }
}
