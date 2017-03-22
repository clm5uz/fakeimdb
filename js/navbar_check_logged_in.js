$(document).ready(function() {
	performLoginChanges();
});

function performLoginChanges() {
       	$.ajax({
               	url: 'check_logged_in.php',
                success: function(data) {	
                       	var loggedIn = data;
                        if (loggedIn == "true") {
                               	$("#logoutButton").html("<li><a href=\"logout.php\">Logout</a></li>");
                        }
                }
	});
}
