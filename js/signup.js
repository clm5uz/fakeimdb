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
	var firstName = document.getElementById('inputFirstname');
	var lastName = document.getElementById('inputLastname');
	var email = document.getElementById('inputEmail');
	if (firstName.value === "" || lastName.value === "") {
		alertString = "You must enter a full name.<br>";
	}
	var username = document.getElementById('inputUsername');
        var usernameError = document.getElementById('usernameError');
        if (username.value === "") {
                alertString = alertString + "You must enter a username.<br>";
        } else if (usernameError.style.display != "none") {
                alertString = alertString + "You must choose a unique username.<br>";
        }
	if (email.value === "") {
		alertString = alertString + "You must enter an email.<br>";
	}
	var password1 = document.getElementById('inputPassword1');
	var password2 = document.getElementById('inputPassword2');
	var passwordCheck = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
	if (password1.value != password2.value) {
		alertString = alertString + "Passwords must match.<br>";
	} else if (!password1.value.match(passwordCheck)) {
		alertString = alertString + "Your password must be at least eight characters, and must contain:<ul><li>An uppercase letter</li><li>A lowercase letter</li><li>A number</li><li>A special character</li></ul>"
	}

	if (alertString != "") {
		document.getElementById('modal_text').innerHTML = alertString;
		$('#open_validate').click();
		return false;
	} else {
		return true;
	}	
}
