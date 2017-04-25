'use strict';

// Register `phoneDetail` component, along with its associated controller and template
angular.
  module('tvshowDetail').
  component('tvshowDetail', {
    templateUrl: 'tvshow-detail/tvshow-detail.template.html',
    controller: ['$routeParams', '$http',
      function ($routeParams, $http) {
        var self = this;
        /* Get tvshow summary */
        self.mediaId = $routeParams.mediaId;
        $http.post('tvshow-detail/tvshow-summary.php', {"mediaId": this.mediaId}).
        then(function(response){
          self.tvshowSummary = response.data;
          //console.log("What's the word? " + self.tvshowSummary['title']);
        });
        /* Get tvshow episodes */
        $http.post('tvshow-detail/tvshow-episodes.php', {"mediaId": this.mediaId}).
        then(function(response){
          self.tvshowEpisodes = response.data;
          console.log("What's the word? " + self.tvshowEpisodes.length);
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
