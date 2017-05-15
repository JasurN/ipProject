<?php
include('../userValidation.php');

session_start(); // Starting Session

    $error=''; // Variable To Store Error Message
    if (isset($_POST['login']))
    {
        if (empty($_POST['username']) || empty($_POST['password']))
        {
            $error = "Username or Password is invalid";
        }
        else
        {
            $mail=$_POST['username'];
            $password=$_POST['password'];
            if(isValidUser($mail, $password))
            {
                $_SESSION['login_user'] = $mail;
                header("location: http://localhost/olx/pages/index.html");
            }
            else
                $error = "Username or password is wrong!";
        }
    }

?>