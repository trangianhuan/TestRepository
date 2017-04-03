var app = angular.module('tickedApp', ['ngResource'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('TickedController', function($scope, $http) {
    $scope.posts = [];
    $scope.name = "nameangular";    
    
        $http.get('http://localhost/QualityAssurance/public/IssuesAngular').
        success(function(data, status, headers, config){
            $scope.posts =data.tickeds.data;
            console.log($scope.posts);
        });
    
    $scope.totalPages = 0;
    $scope.currentPage = 1;
    $scope.range = [];
    // data list course of page
    $scope.getCourse = function (pageNumber) {
        if (pageNumber === undefined) {
            pageNumber = '1';
        }        
         console.log(pageNumber) ;          
      //$http.get('http://localhost/QualityAssurance/public/IssuesAngular' + '?page=' + pageNumber).success(function(response) {
        $http({
            url: 'http://localhost/QualityAssurance/public/IssuesAngular',
            method: "GET",
            params: {page: pageNumber}
        }).success(function(response) {
            $scope.posts      = response.tickeds.data;
            $scope.totalPages   = response.tickeds.last_page;
            $scope.currentPage  = response.tickeds.current_page;
            // Pagination Range
            var pages = [];
            console.log($scope.currentPage);
            for (var i = 1; i <= response.last_page; i++) {
                pages.push(i);
            }
            $scope.range = pages;
        });
    };
});
app.directive('postsPagination', function(){
   return {
      restrict: 'E',
      template: '<ul class="pagination">'+
              '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getCourse(1)">&laquo;</a></li>'+
              '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getCourse(currentPage-1)">&lsaquo;</a></li>'+
              '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
                  '<a href="javascript:void(0)" ng-click="getCourse(i)">{{i}}</a>'+
              '</li>'+
              '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getCourse(currentPage+1)">Next &rsaquo;</a></li>'+
              '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getCourse(totalPages)">&raquo;</a></li>'+
            '</ul>'
   };
});