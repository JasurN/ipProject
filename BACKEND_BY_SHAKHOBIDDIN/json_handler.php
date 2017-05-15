<?php
$json_str = file_get_contents('php://input');
$post = json_decode($json_str);
echo "title: ".$post->title."<br>";
echo "price: ".$post->price."<br>";
echo "description: ".$post->description."<br>";
?>