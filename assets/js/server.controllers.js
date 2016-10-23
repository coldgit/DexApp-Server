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
.controller('upCtrl',function($scope,$http){
  $scope.image = "img/logo.png";
  $scope.submit_img = function()
  {     
        var fd = new FormData();
        fd.append('userfile',document.getElementById('f').files[0]);
        console.log(fd.getAll('userfile'));
        $http({
                method: 'POST',
                url: 'http://localhost/DexApp-Server/upload/do_upload',
                withCredentials: true,
                headers: { 'Content-Type': undefined },
                transformRequest: angular.identity,
                data: fd
              }).then(function(resp){
                console.log(resp.data.upload_data.file_name);
                $scope.image =resp.data.upload_data.file_name;
              },function(err){
                console.log(err.data);
              });
     
  }
  
});