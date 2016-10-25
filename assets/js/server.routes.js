var base_url = window.location.protocol+'//'+window.location.host;

angular.module('dexapp_server.routes',[])
.run(function($rootScope, $state, AuthService){
  $rootScope.$on("$stateChangeStart", function(event, toState, toParams, fromState, fromParams){
    if (toState.authenticate && !AuthService.isAuthenticated() && AuthService.isLogout()){
      // User isn’t authenticated
      $state.transitionTo("home");
      event.preventDefault(); 
    }

  });
 
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
      authenticate:true
    })

    .state('all',{
      url:'/anime',
      templateUrl: 'templates/animes.html',
      authenticate:true
    })
    .state('anime',{
      url:'/anime/:url',
      templateUrl: 'templates/anime.html',
      authenticate:true
    })
    .state('episode',{
      url:'/anime/:url/episode/:id',
      templateUrl: 'templates/episode.html',
      authenticate:true
    })


  // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/home');
});