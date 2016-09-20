angular.module('dexapp_server.routes',[])
.config(function($stateProvider, $urlRouterProvider) {
  $stateProvider

    .state('http://127.0.0.1:8080/DexApp-Server/', {
    url: 'http://127.0.0.1:8080/DexApp-Server/',
    abstract: true,
   
  })

    .state('http://127.0.0.1:8080/DexApp-Server/', {
    url: 'http://127.0.0.1:8080/DexApp-Server/update',
  })


  // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/');
});