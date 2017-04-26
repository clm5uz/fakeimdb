'use strict';

// Register `phoneDetail` component, along with its associated controller and template
angular.
  module('topMovies').
  component('topMovies', {
    templateUrl: 'top-movies/top-movies.template.html',
    controller: ['$http',
      function ($http) {
        var self = this;
        $http.post('top-movies/top-movies.php').
        then(function(response){
          self.topMovies = response.data;
          //console.log("What's the word? " + self.topMovies['Family'][0]['title']);
        });
    }]
  });
