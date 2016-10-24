var base_url = window.location.protocol+'//'+window.location.host;

angular.module('dexapp_server.routes',[])
.config(function($stateProvider, $urlRouterProvider) {
  $stateProvider

    .state('home', {
      url: '/home',
      templateUrl: 'templates/home.php',
    })
    .state('admin', {
      url: '/admin',
      templateUrl: 'templates/admin.html',
    })
    .state(base_url+'update', {
    url: base_url+'update',
  })


  // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/home');
});