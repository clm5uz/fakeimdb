'use strict';

angular.
  module('FakeImdb').
  config(['$locationProvider' ,'$routeProvider',
    function config($locationProvider, $routeProvider) {
      $locationProvider.hashPrefix('!');
      $routeProvider.
        when('/movies/:movieId', {
          template: '<movie-detail></movie-detail>'
        }).
        when('/tvshows/:mediaId', {
          template: '<tvshow-detail></tvshow-detail>'
        }).
        when('/episodes/:mediaId/:seasonId/:episodeId', {
          template: '<episode-detail></episode-detail>'
        }).
        when('/top_movies', {
          template: '<top-movies></top-movies>'
        }).
        when('/top_shows', {
          template: '<top-shows></top-shows>'
        }).
        otherwise('/top_movies');
    }
  ]);
