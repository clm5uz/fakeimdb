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
        self.imgUrl = 'pizza';
        this.pizza = 'pizza';
        $http.post('movie-detail/movie-detail.php', {"movieId": this.movieId}).
        then(function(response){
          self.movieData = response.data;
          //self.imgUrl = 'img/movie-poster/' + self.movieId + '.jpg';
          //console.log("What's the word? " + self.movieData['title']);
        });
    }]
  });
