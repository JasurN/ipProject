<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
    header("Location: ../pages/index.html"); // Redirecting To Home Page
}
?>s