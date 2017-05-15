<?php
$json_str = file_get_contents('php://input');
$post = json_decode($json_str);
?>