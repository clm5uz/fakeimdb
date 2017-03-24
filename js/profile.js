$(document).ready(function() {
	performLoginChangesProfile();
	loadWantToWatchMedia();
	loadWatchedMedia();
});

function performLoginChangesProfile() {
       	$.ajax({
               	url: 'check_logged_in.php',
                success: function(data) {	
                       	var loggedIn = data;
                        if (loggedIn != "true") {
				location.href = "index.html";
                        }
                }
	});
}

function loadWantToWatchMedia() {
        $.ajax({
                url: 'want_to_watch_media.php',
                success: function(data){
                    $('#want-to-watch-media').html(data);
                }
        });
}

function loadWatchedMedia() {
	$.ajax({
                url: 'watched_media.php',
                success: function(data){
                    $('#watched-media').html(data);
                }
        });
}
