var base_url = window.location.protocol+'//'+window.location.host;

angular.module('dexapp_server.routes',[])
.run(function($rootScope, $state, AuthService){
  $rootScope.admin = false;
  $rootScope.client = false;
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
      // authenticate:true
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
    $urlRouterProvider
    .when('users/:any','/home')
    .when('users','/home')
    .when('anime','/home')
    .when('anime/:any1/episodes','/home')
    .when('episode/:any2/comments','home')
    .when('episode/:any3/comment/:any4','/home')
    .when('auth','/home')
    .when('Checker?:any5','/home')
    .otherwise('/home');
});