'use strict';

/**
 * Route configuration for the RDash module.
 */
angular.module('RDash').config(['$stateProvider', '$urlRouterProvider',
    function($stateProvider, $urlRouterProvider) {

        // For unmatched routes
        $urlRouterProvider.otherwise('/');

        // Application routes
        if(appType == 'admin') {
            $stateProvider
                .state('index', {
                    url: '/',
                    templateUrl: publicUrl + 'templates/dashboard.html'
                })
                .state('tables', {
                    url: '/tables',
                    templateUrl: publicUrl + 'templates/tables.html'
                });
        } else {
            $stateProvider
                .state('index', {
                    url: '/',
                    templateUrl: publicUrl + 'templates/user.html'
                });
        }
    }
]);