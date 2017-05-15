
var immovable = '<option value="4">Flats</option><option value="5">Detachded Houses</option>';
var auto = '<option value="1">Passenger Cars</option><option value="2">Trucks</option><option value="3">Motorcycles</option>';
var house_fac = '<option value="6">Furniture</option>';
var tech = '<option value="7">Mobile Devices</option><option value="8">Laptops</option>';
var cat = document.getElementById("category");
var photo_names = new Array(6);
var photo_count = 0;


function subcat_change() {
    var cat = document.getElementById("category");
    if (cat.value == 1)
        document.getElementById("subcategory").innerHTML = immovable;
    else if (cat.value == 2)
        document.getElementById("subcategory").innerHTML = auto;
    else if (cat.value == 3)
        document.getElementById("subcategory").innerHTML = house_fac;
    else if (cat.value == 4)
        document.getElementById("subcategory").innerHTML = tech;
};


$(document).ready(function () {
    for (var i = 0; i < 6; i++)
        photo_names[i] = '';
    $('body').on('click', 'input[name=add-photo]', function () {
        $('#photo-area').css('display', 'block');
        $('#photo-area').animate({'margin-left':'400px'});
    });
});

function upload_photo(element)
{
    var photo = element.files[0];
    var reader = new FileReader();
    var asd = element.previousElementSibling;
    reader.onload = function () {
        element.previousElementSibling.firstElementChild.style.backgroundImage = "url(" + reader.result + ")";
        element.previousElementSibling.firstElementChild.style.backgroundSize = "100%";
        photo_names[photo_count] = photo.name;
        photo_count++;
    }
    if (photo) {
        reader.readAsDataURL(photo);
    }
    document.getElementById('photo-area').target = 'upload-frame';
    document.getElementById('photo-area').submit();
}

function upload_info(username)
{
    var form = document.getElementById("post-info");
    var post = {
        "title": form.elements.namedItem("title").value,
        "price": form.elements.namedItem("price").value,
        "description": form.elements.namedItem("description").value,
        "region": form.elements.namedItem("region").value,
        "cat_id": form.elements.namedItem("category").value,
        "subcat_id": form.elements.namedItem("subcategory").value,
        "user_mail": username,
        "is_premium": '0',
        "photo_count": photo_count,
        "photo0": photo_names[0],
        "photo1": photo_names[1],
        "photo2": photo_names[2],
        "photo3": photo_names[3],
        "photo4": photo_names[4],
        "photo5": photo_names[5]
    }
    var info= JSON.stringify(post);
    var xhttp = new XMLHttpRequest();
    xhttp.open("post", "json_post_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(info);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("response").innerHTML = this.responseText;
            alert(this.responseText);
        }
    }
}