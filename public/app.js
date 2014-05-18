// when we declare the app itself, we also list the dependencies
var demoApp = angular.module('demoApp', ['ngResource', 'ngRoute']);

// here we are configuring the routes for the app
demoApp.config(function($routeProvider) {
  $routeProvider
  	.when('/', {
      // each route is matched with a template and a controller
  		templateUrl: 'page-summary.html',
      controller: 'summaryController'
  	})
  	.when('/slides/:slideId', {
  		templateUrl: 'page-slide.html',
      controller: 'slideController'
  	});
});

// each controller has a name and dependencies
demoApp.controller('summaryController', function($scope, $resource) {
  // this is where we talk to the API, by saying we have a resource in this url
  // we're also saying a part of the url is variable, the slide id
  var Slides = $resource('/slides/:slideId');
  // this get is called without a variable, and thus performs get at /slides
  $scope.slideCollection = Slides.get();
});

// this controller requires routeParams to access the url variable
demoApp.controller('slideController', function($scope, $resource, $routeParams) {
  var Slides = $resource('/slides/:slideId');
  // this time we're doing a get with a parameter, the slideId from the url
  $scope.slide = Slides.get({slideId:$routeParams.slideId});
});
