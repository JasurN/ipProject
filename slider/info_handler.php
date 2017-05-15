<?php
if(isset($_GET))
{
    $id = $_GET["post_id"];
    $post_info = new stdClass;
    $post_info->title = "Something something!";
    $post_info->short_info = "bla bla bla...";
    $post_info->photo = "http://localhost/olx/images/hello.jpg";
    $json_encoded = json_encode($post_info,JSON_PARTIAL_OUTPUT_ON_ERROR);
    echo $json_encoded;
}
else
    echo "Failed to load";
?>