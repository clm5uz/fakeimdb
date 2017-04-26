'use strict';

// Register `phoneDetail` component, along with its associated controller and template
angular.
  module('movieDetail').
  component('movieDetail', {
    templateUrl: 'movie-detail/movie-detail.template.html',
    controller: ['$routeParams', '$http',
      function ($routeParams, $http) {
        var self = this;
        self.movieId = $routeParams.movieId;
        $http.post('movie-detail/movie-detail.php', {"movieId": this.movieId}).
        then(function(response){
          self.movieData = response.data;
          //console.log("What's the word? " + self.movieData['title']);
          /* Get thumbnailUrl */
          var searchTerm = self.movieData['title'] + "movie poster";
          $http.post('query_templates/ImageTest.php', {"searchTerm": searchTerm}).
          then(function(response){
            self.imgUrl = response.data;
            console.log("What's the word? " + self.imgUrl);
          });
        });
        /* See if this media is already on your wants_to_watch list */
        $http.post('query_templates/GetUserId.php').
        then(function(response){
          self.userId = response.data;
          // Not logged in, don't show wants_to_watch button
          if (self.userId.includes("-1")){
            self.showButton = false;
          }
          else {
            //console.log("Who am I?: " + self.userId);
            self.showButton = true;
            $http.post('query_templates/WatchStatus.php',
            {"media_id": self.movieId, "user_id": self.userId}).
            then(function(response){
              self.watchResponse = response.data;
              //console.log("What's the word? " + self.watchResponse['message']);
            });
          }
        });
        self.watchStatus = function watchStatus() {
          $http.post('query_templates/WatchUpdate.php',
          {"media_id": self.movieId, "user_id": self.userId}).
          then(function(response){
            self.watchResponse = response.data;
            //console.log("NEW STATUS: " + self.watchResponse['message']);
          });
        };
    }]
  });
