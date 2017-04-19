'use strict';

// Register `phoneDetail` component, along with its associated controller and template
angular.
  module('episodeDetail').
  component('episodeDetail', {
    templateUrl: 'episode-detail/episode-detail.template.html',
    controller: ['$routeParams', '$http',
      function ($routeParams, $http) {
        var self = this;
        /* Get episode details */
        self.mediaId = $routeParams.mediaId;
        self.seasonId = $routeParams.seasonId;
        self.episodeId = $routeParams.episodeId;
        $http.post('episode-detail/episode-detail.php',
        {"mediaId": this.mediaId, "seasonId": this.seasonId, "episodeId": this.episodeId}).
        then(function(response){
          self.episodeData = response.data;
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
            self.showButton = true;
            $http.post('query_templates/WatchStatus.php',
            {"media_id": self.mediaId, "user_id": self.userId}).
            then(function(response){
              self.watchResponse = response.data;
              //console.log("What's the word? " + self.watchResponse['message']);
            });
          }
        });
        self.watchStatus = function watchStatus() {
          $http.post('query_templates/WatchUpdate.php',
          {"media_id": self.mediaId, "user_id": self.userId}).
          then(function(response){
            self.watchResponse = response.data;
            //console.log("NEW STATUS: " + self.watchResponse['message']);
          });
        };
    }]
  });
