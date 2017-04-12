'use strict';

// Register `phoneDetail` component, along with its associated controller and template
angular.
  module('episodeDetail').
  component('episodeDetail', {
    templateUrl: 'episode-detail/episode-detail.template.html',
    controller: ['$routeParams', '$http',
      function ($routeParams, $http) {
        var self = this;
        self.mediaId = $routeParams.mediaId;
        self.seasonId = $routeParams.seasonId;
        self.episodeId = $routeParams.episodeId;
        $http.post('episode-detail/episode-detail.php',
        {"mediaId": this.mediaId, "seasonId": this.seasonId, "episodeId": this.episodeId}).
        then(function(response){
          self.episodeData = response.data;
          //console.log("What's the word? " + self.movieData['title']);
        });
    }]
  });
