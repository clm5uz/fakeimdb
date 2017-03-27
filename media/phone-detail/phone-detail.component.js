'use strict';

// Register `phoneDetail` component, along with its associated controller and template
angular.
  module('phoneDetail').
  component('phoneDetail', {
    templateUrl: 'phone-detail/phone-detail.template.html',
    controller: ['$routeParams',
      function PhoneDetailController($routeParams) {
        this.phoneId = $routeParams.phoneId;
      }
    ]
  });
