var base_url = window.location.protocol+'//'+window.location.host;

angular.module('dexapp_server.routes',[])
.run(function($rootScope,$location){
  
  // if(!angular.equals({}, $rootScope.Credentials))
  // {
  //    $location.path('home');
  // }
 
})
.config(function($stateProvider, $urlRouterProvider) {
  
  $stateProvider

    .state('home', {
      url: '/home',
      templateUrl: 'templates/home.html',
    })
    .state('admin', {
      url: '/admin',
      templateUrl: 'templates/admin.html',
    })

    .state('all',{
      url:'/anime',
      templateUrl: 'templates/animes.html',
    })
    .state('anime',{
      url:'/anime/:url',
      templateUrl: 'templates/anime.html',
    })
    .state('episode',{
      url:'/anime/:url/episode/:id',
      templateUrl: 'templates/episode.html',
    })

  // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/home');
});