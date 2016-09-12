var base_url = window.location.protocol+'//'+window.location.host;
console.log(base_url);
angular.module('dexapp_server',['ui.bootstrap','dexapp_server.directive'])
.controller('DexApp_ctrl', function($scope,$location,$http,$httpParamSerializerJQLike)
	{
		
		$scope.change = function(){

			console.log($scope.x);
		}
		$scope.regData = {};

		$scope.submit = function(){

			console.log($scope.regData);
			var url = base_url+'/DexApp-Server/DexApp/regAuth';
			$http({
				method:'POST',
				url: url,
				headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
				data:$httpParamSerializerJQLike($scope.regData),
			}).then(function(response){
				console.log(response.data);
				$scope.regData = {};
				
			},function(error){
				console.log(error);
			});
		}
	})
.controller('UsersCtrl',function($scope,$http,$httpParamSerializerJQLike)
	{
			var url = base_url+'/DexApp-Server/dexapp/registered';
	  $http({
	  	method:'GET',
	  	url:url,
	  	headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
	  }).then(
	  	function(resp){
	  			console.log(resp.data.data.length);
	  			$scope.reginfo = resp.data;
	  			$scope.totalItems = resp.data.data.length;
				$scope.currentPage = 1;
				$scope.maxSize = 5;
	  	},
	  	function(err){
	  		console.log(err);
	  	});
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
