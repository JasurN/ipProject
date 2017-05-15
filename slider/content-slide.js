//This is google image like short info animation

var expanded = 0;           //status flag
var global_interval_id = 0; //animation interval id
var content_box;            //expantion container
var expand_speed = 17;      //expantion speed
var max_height = 300;       //max expansion height
var min_height = 0          //min collapsion height
var last_clicked;
var previous_pos_y;
var info_row;
var post_info;
var short_info;
var res;

$(document).ready(function () {
    //short info slide event handler
    content_box = document.getElementById("inf");
    short_info = document.getElementById("info");

    $(".post-info").click(function () {
        //previous_pos_y = this.style.top;
        info_row = this.parent;
        last_clicked = this;
        if (expanded == 0) {
            expanded = 1;
            var xhhtp = new XMLHttpRequest();
            xhhtp.open("GET", "info_handler.php?post_id=" + last_clicked.firstChild.innerHTML, true);
            xhhtp.send();
            xhhtp.onreadystatechange = function()
            {
                if(this.status == 200 && this.readyState == 4)
                {
                    post_info = JSON.parse(xhhtp.responseText);
                    content_box.firstElementChild.firstElementChild.lastElementChild.innerHTML =
                        "<h1>" + post_info.title + "</h1><br>" + post_info.short_info;
                    content_box.firstElementChild.firstElementChild.firstElementChild.style.backgroundImage =
                        "url(" + post_info.photo + ")";
                }
            }
            expand(content_box, expand_speed, max_height);
        }
        else if (last_clicked == this) {
            expanded = 0;
            collapse(content_box, expand_speed, min_height);
        }
    })
})

//collapsion animation function
function collapse(container, speed, min_height) {
    if (global_interval_id != 0) {
        clearInterval(global_interval_id);
        global_interval_id = 0;
    }

    var h = container.style.height.substring(0, 3);  //initial height
    global_interval_id = setInterval(slide_up, 10);
    function slide_up() {
        container.style.height = h + "px";
        h -= speed;
        if (h <= min_height) {
            clearInterval(global_interval_id);
            container.style.height = min_height + "px";
        }
    }
}

//expantion animation
function expand(container, speed, max_height) {
    if (global_interval_id != 0) {
        clearInterval(global_interval_id);
        global_interval_id = 0;
    }

    var h = 0;      //initial height
    global_interval_id = setInterval(slide_down, 10);
    function slide_down() {
        container.style.height = h + "px";
        h += speed;
        if (h >= max_height) {
            clearInterval(global_interval_id);
            container.style.height = max_height + "px";
        }
    }
}
