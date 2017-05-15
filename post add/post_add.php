<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php 
        include('../login/loggedUser.php');
        ?>
    <title>Add New Post
    </title>
    <link rel="stylesheet" type="text/css" href="post_add_style.css" />
    <script type="text/javascript" src="../jquery.js"></script>
    <script type="text/javascript" src="post-add-script.js"></script>
</head>

<body>
    <div id="info-area">
        <form id="post-info"  onsubmit='upload_info("<?php echo $username ?>")'>
            <h1 style="text-align: center;">New Post</h1>
            <fieldset>
                <input id="title" type="text" placeholder="Title" />
                <input id="price" type="text" placeholder="Price" />
                <select id="category" name="cat" onchange="subcat_change()">
                    <option value="1">Immovables</option>
                    <option value="2">Auto</option>
                    <option value="3">House Facility</option>
                    <option value="4">Technics</option>
                </select>
                <select id="subcategory" name="subcat">
                    <option value="4">Flats</option>
                    <option value="5">Detachded Houses</option>
                </select>
                <select id="region" name="region">
                    <option value="Tashkent">Tashkent</option>
                    <option value="Andijon">Andijon</option>
                    <option value="Fergana">Fergana</option>
                    <option value="Jizzakh">Jizzakh</option>
                    <option value="Xorazm">Xorazm</option>
                    <option value="Namangan">Namangan</option>
                    <option value="Navoiy">Navoiy</option>
                    <option value="Qashqadaryo">Qashqadaryo</option>
                    <option value="Samarqand">Samarqand</option>
                    <option value="Sirdaryo">Sirdaryo</option>
                    <option value="Karakalpakstan">Karakalpakstan</option>
                    <option value="Bukhara">Bukhara</option>
                </select>
                <textarea id="description" name="description" placeholder="Description" style="resize: none"></textarea>
                <input type="submit" name="submit" class="submit action-button" value="Submit" />
                <input type="button" name="add-photo" class="action-button" value="Add Photo"/>
            </fieldset>
        </form>
        <form id="photo-area" name="form" action="../logic.php" method="post" enctype="multipart/form-data">
            <label for="upload-button-1">
                <div class="photo-upload"></div>
            </label>
            <input type="file" name="photo1" id="upload-button-1" style="display: none" onchange="upload_photo(this)" />

            <label for="upload-button-2">
                <div class="photo-upload"></div>
            </label>
            <input type="file" name="photo2" id="upload-button-2" style="display: none" onchange="upload_photo(this)" />

            <label for="upload-button-3">
                <div class="photo-upload"></div>
            </label>
            <input type="file" name="photo3" id="upload-button-3" style="display: none" onchange="upload_photo(this)" />

            <label for="upload-button-4">
                <div class="photo-upload"></div>
            </label>
            <input type="file" name="photo4" id="upload-button-4" style="display: none" onchange="upload_photo(this)" />

            <label for="upload-button-5">
                <div class="photo-upload"></div>
            </label>
            <input type="file" name="photo5" id="upload-button-5" style="display: none" onchange="upload_photo(this)" />

            <label for="upload-button-6">
                <div class="photo-upload"></div>
            </label>
            <input type="file" name="photo6" id="upload-button-6" style="display: none" onchange="upload_photo(this)" />
            <iframe id="upload-frame" name="upload-frame" style="display:none"></iframe>
        </form>
    </div>

</body>
</html>
