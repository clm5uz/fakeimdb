'use strict';

// Register `phoneDetail` component, along with its associated controller and template
angular.
  module('topShows').
  component('topShows', {
    templateUrl: 'top-shows/top-shows.template.html',
    controller: ['$http',
      function ($http) {
        var self = this;
        $http.post('top-shows/top-shows.php').
        then(function(response){
          self.topShows = response.data;
          console.log("What's the word? " + self.topShows['Comedy'][0]['title']);
        });
    }]
  });
