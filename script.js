function redirect()
{
document.getElementById('my_form').target = 'my_iframe'; //'my_iframe' is the name of the iframe
document.getElementById('my_form').submit();
}

function send_info()
{
    var form = document.getElementById("info");
    var post = {
        "title": form.elements[0].value,
        "price": form.elements[1].value,
        "description": form.elements[2].value
    }
    var json_str = JSON.stringify(post);
    var xhttp = new XMLHttpRequest();
    xhttp.open("post", "json_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(json_str);
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            document.getElementById("response").innerHTML = this.responseText;
        }
    }
}