$(document).ready(function() {
	$( "#inputUsername" ).change(function() {
                $.ajax({
                        url: 'check_username.php',
                        data: {username: $( "#inputUsername" ).val()},
                        success: function(data){
                                if (data.trim() == "true") {
                                        $('#inputUsername').css("background-color", "#ff6666");
                                	$('#usernameError').css("display", "");
                                } else {
                                        $('#inputUsername').css("background-color", "");
                                	$('#usernameError').css("display", "none");
                        	}
                	}
       		});
	});
	$('#inputPassword2').change(function() {
		if ($('#inputPassword1').val() != $('#inputPassword2').val()) {
			$('#inputPassword1').css("background-color", "#ff6666");
			$('#inputPassword2').css("background-color", "#ff6666");
			$('#passwordError').css("display", "");
		} else {
			$('#inputPassword1').css("background-color", "");
                        $('#inputPassword2').css("background-color", "");
                        $('#passwordError').css("display", "none");
		}
	});
	$('#inputPassword1').change(function() {
                if ($('#inputPassword1').val() != $('#inputPassword2').val()) {
                        $('#inputPassword1').css("background-color", "#ff6666");
                        $('#inputPassword2').css("background-color", "#ff6666");
                        $('#passwordError').css("display", "");
                } else {
                        $('#inputPassword1').css("background-color", "");
                        $('#inputPassword2').css("background-color", "");
                        $('#passwordError').css("display", "none");
                }
        });
});

function validateSignupForm() {
	alertString = "";
	var password1 = document.getElementById('inputPassword1');
	var password2 = document.getElementById('inputPassword2');
	if (password1.value != password2.value) {
		alertString = "Passwords must match.\n";
	}

	var usernameError = document.getElementById('usernameError');
	if (usernameError.style.display != "none") {
		alertString = alertString + "You must choose a unique username.\n";
	}

	if (alertString != "") {
		alert(alertString);
		return false;
	} else {
		return true;
	}	
}
