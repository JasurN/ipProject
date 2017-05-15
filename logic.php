<?php
foreach($_FILES as $photo)
{
    if(isset($photo) && $photo['error'] == 0){
        $errors= array();
        $errors = $photo['error'];
        $file_name = $photo['name'];
        $file_size = $photo['size'];
        $file_tmp = $photo['tmp_name'];
        $file_type = $photo['type'];
        $file_ext=strtolower(end(explode('.',$photo['name'])));

        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152) {
            $errors[]='File size must be excately 2 MB';
        }
        if(empty($errors)==true) {
            if(rename($file_tmp, 'images/'.$file_name))
            {
                echo "Success";
            }
            else
                echo "Failed";
        }else{
            print_r($errors);
        }
    }
    else
    {
        echo "failed";
    }
}

?>
