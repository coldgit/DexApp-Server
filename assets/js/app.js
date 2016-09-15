angular.module('dexapp_server',['ui.bootstrap','dexapp_server.directive','dexapp_server.services'])
.controller('DexApp_ctrl', function($scope,$rootScope,UsersList,$http,$httpParamSerializerJQLike)
	{
		$rootScope.regData = {};
		$scope.change = function(){

			console.log($scope.x);
		}
    $scope.checkU_Match = true;
    $scope.checkUsername = function(){
       $http({
             method:'GET',
             url:'http://127.0.0.1:8080/DexApp-Server/dexapp/checkusername',
             headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
             params:{username:$scope.regData.username},
           }).then(
             function(resp){
                 console.log(resp.data);
                 if(resp.data.check)
                 {
                  $scope.checkU_Match = resp.data.check;
                 }else{
                  $scope.checkU_Match = resp.data.check;
                 }
             },
             function(err){
               console.log(err);
             });
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
});


//admin admindex admin123
// <?php //para sa ani_url
// 	$foo = 'hello world! hakjd haklsdj ahskjd ashlkd';
// 	$foo = explode(" ", $foo);
// 	for($i = 0; $i < count($foo) ; $i++) {
// 		$foo[$i] = ucfirst($foo[$i]);  
// 	}
// 	$foo = implode("-", $foo);
// 		           // Hello world!

// 	var_dump($foo);    
// ?>
