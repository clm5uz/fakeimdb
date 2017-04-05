'use strict';

angular.
  module('FakeImdb').
  config(['$locationProvider' ,'$routeProvider',
    function config($locationProvider, $routeProvider) {
      $locationProvider.hashPrefix('!');
      $routeProvider.
        when('/phones', {
          template: '<phone-list></phone-list>'
        }).
        when('/phones/:phoneId', {
          template: '<phone-detail></phone-detail>'
        }).
        when('/movies/:movieId', {
          template: '<movie-detail></movie-detail>'
        }).
        otherwise('/phones');
    }
  ]);
