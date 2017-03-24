$(document).ready(function () {
	$("#navbar-frame").load("navbar.html");
	$.ajax({
                url: 'check_logged_in.php',
                success: function(data) {
                        var loggedIn = data;
                        if (loggedIn == "true") {
                                $("#loggedInOnly").css("display", "");
                        } else {
                                $("#loggedInOnly").css("display", "none");
                        }
                }
        });
});
