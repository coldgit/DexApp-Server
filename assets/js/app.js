angular.module('dexapp_server',['ui.bootstrap','dexapp_server.directive','dexapp_server.services'])
.controller('DexApp_ctrl', function($scope,$rootScope,UsersList)
	{
		
		$scope.change = function(){

			console.log($scope.x);
		}
		$rootScope.regData = {};

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
