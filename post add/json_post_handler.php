<?php
require_once('../Mapper.php');
$json_str = file_get_contents('php://input');
echo "received";
$mapper = new Mapper();
$post = $mapper->jsonToPost($json_str);
$mapper->addPostToDBwithObj($post);
?>