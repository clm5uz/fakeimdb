$(document).ready(function() {
	performLoginChanges();
	loadTopMovies();
	loadTopShows();
});

function performLoginChanges() {
       	$.ajax({
               	url: 'check_logged_in.php',
                success: function(data) {	
                       	var loggedIn = data;
                        if (loggedIn != "true") {
                               	$("#loginForm").load("login.html");
                        }
                }
	});
}

function loadTopMovies() {
	$.ajax({
                url: 'top_movies.php',
                success: function(data){
                    $('#top-movies').html(data);
                }
        });
}

function loadTopShows() {
	$.ajax({
                url: 'top_shows.php',
                success: function(data) {
                        $('#top-shows').html(data);
                }
        });
}
