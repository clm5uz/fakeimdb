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
        });
    }]
  });
