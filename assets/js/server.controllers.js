angular.module('dexapp_server.controllers',[])
.controller('DexApp_ctrl', function($scope,$rootScope,UsersList)
	{
		$rootScope.regData = {};
		$scope.change = function(){

			console.log($scope.x);
		}
    $rootScope.checkU_Match = true;
    $scope.checkUsername = function(){
      UsersList.check($scope.regData.username);
     //    $scope.checkUsernameMatch = ((  $scope.regData.username!=  $scope.regData.repassword)? false:true);
    }
		
     $scope.passwordmatch = true;
    $scope.check = function(){
                               $scope.passwordmatch = ((  $scope.regData.password!=  $scope.regData.repassword)? false:true);
                            }
    

		$scope.submit = function(){

				UsersList.submit($rootScope.regData);
		
		}
	})
.controller('UsersCtrl',function($scope,$rootScope,UsersList)
	{
		 
		  	UsersList.getUsers();
	
		  $scope.deleteUser = function(username)
		  {
		    UsersList.deleteUser(username);
		  }

		  $scope.getUser = function(username)
		  {
		  	UsersList.getUser(username);
		  }
	})
.controller('CarouselDemoCtrl', function ($scope,UsersList) {
  $scope.myInterval = 2000;
  $scope.noWrapSlides = false;
  $scope.active = 0;
  var slides = $scope.slides = [];
  var currIndex = 0;

    slides.push(UsersList.img());
   
  $scope.randomize = function() {
    var indexes = generateIndexesArray();
    assignNewIndexesToSlides(indexes);
  };

  
  // Randomize logic below

  function assignNewIndexesToSlides(indexes) {
    for (var i = 0, l = slides.length; i < l; i++) {
      slides[i].id = indexes.pop();
    }
  }

  function generateIndexesArray() {
    var indexes = [];
    for (var i = 0; i < currIndex; ++i) {
      indexes[i] = i;
    }
    return shuffle(indexes);
  }

  // http://stackoverflow.com/questions/962802#962890
  function shuffle(array) {
    var tmp, current, top = array.length;

    if (top) {
      while (--top) {
        current = Math.floor(Math.random() * (top + 1));
        tmp = array[current];
        array[current] = array[top];
        array[top] = tmp;
      }
    }

    return array;
  }
})
.controller('loginCtrl',function($scope,UsersList){
	$scope.logData = {};
	$scope.login = function(){
		console.log($scope.logData);
			UsersList.login($scope.logData);
			$scope.logData = {};
		}
})
.controller('AnimeCtrl',function($scope,$http,$rootScope,Anime){
  $rootScope.image = "img/logo.png";
  $scope._img = function()
  {     
        var fd = new FormData();
        
        fd.append('userfile',document.getElementById('f').files[0]);
        Anime.uploadImg_anime(fd);

  }
  $scope.submit_anime = function()
  {
    $scope.animeData.img_src = "uploads/"+$rootScope.image;
    Anime.new_anime($scope.animeData);  
    $rootScope.image = "";
    $scope.animeData = {};
    document.getElementById('f').value = "";
  }
  Anime.list_anime();
  $scope.delete_anime = function(ani_title)
  {
    Anime.delete_anime(ani_title);
  }
})
.controller('EpisodeCtrl',function($scope,$http,Anime,$rootScope,Episode){
  Anime.list_anime();
   $rootScope.vid = true;
   $scope._video = function()
  {     
        var fd = new FormData();
        $rootScope.video = "";
        fd.append('userfile',document.getElementById('video').files[0]);
        console.log(fd.getAll('userfile'));
        Episode.uploadVideo_anime(fd);

  }
  $scope.episode = function()
  {
    $scope.Episode.epi_src = $rootScope.video;
    Episode.new_episode($scope.title.ani_title.replace(/\s+/g, '-'),$scope.Episode);
    $scope.Episode = {};
    $scope.title = "";
    document.getElementById('video').value = "";
    $rootScope.vid = true;
  }
  $scope.list_episodes = function(title)
  {
    Episode.list_episodes(title.replace(/\s+/g, '-'));
  }
  $scope.delete_episode = function(title,id)
  {
    title = title.replace(/\s+/g, '-');
    console.log(title,id);
    Episode.delete_episode(title,id);
  }
})
.controller('CommentCtrl',function(){

});