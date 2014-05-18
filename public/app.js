var demoApp = angular.module('demoApp', ['ngResource']);

demoApp.controller('summaryController', function($scope, $resource) {
  var Slides = $resource('/slides/:slideId');
  $scope.slideCollection = Slides.get();
});
