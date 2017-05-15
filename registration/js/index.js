var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var valid_info = false;
$(".next").click(function () {
    if (valid_info) {


        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'position': 'absolute'
                });
                next_fs.css({ 'left': left, 'opacity': opacity });
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'

        });

    }
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$("#msform input[type=email]").keyup(function () {
    if(!validateEmail(this.value)){
        $(this).removeClass("default");
        $(this).addClass("not-valid");
        valid_info = false;
    }else{
        $(this).removeClass("not-valid");
        $(this).addClass("default");
        valid_info = true;
    }
});

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
}

$(".submit").click(function () {
    var user = {
        email: $("#msform #login-pass input[name=email]").val(),
        password: $("#msform #login-pass input[name=pass]").val(),
        fname: $("#msform #account-info input[name=fname]").val(),
        lname: $("#msform #account-info input[name=lname]").val(),
        phone: $("#msform #account-info input[name=phone]").val(),
        country: $("#msform #account-details input[name=country]").val(),
        city: $("#msform #account-details input[name=city]").val()
    };

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "logic/registration.php", true);
    user = JSON.stringify(user);
    xhttp.send(user);

    if (xhttp.status == 200 && xhttp.readyState == 4)
    {
        alert(xhttp.responseText);
    }
	return false;
})