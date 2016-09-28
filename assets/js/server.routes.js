var base_url = window.location.protocol+'//'+window.location.host;

angular.module('dexapp_server.routes',[])
.config(function($stateProvider, $urlRouterProvider) {
  $stateProvider

    .state(base_url, {
    url: base_url,
    abstract: true,
   
  })

    .state(base_url+'update', {
    url: base_url+'update',
  })


  // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/');
});