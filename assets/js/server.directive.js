angular.module('dexapp_server.directive',[])
.directive('regform', function() {
  return {
  	 restrict: 'E',
    template: '<div id="container" >'
    			+'<div class="col-md-2" ng-controller="DexApp_ctrl">'
    			+'<form ng-submit="submit()">'
    			+'<div class="form-group">'
	    			+'<label>Username'+'</label>'
	    			+'<input type="text" class="form-control" ng-model="regData.username" required>'
    			+'</div>'
    			+'<div class="form-group">'
    				+'<label>Password'+'</label>'
    				+'<input type="password" class="form-control" ng-model="regData.password" required>'
    			+'</div>'
    			+'<div class="form-group">'
    				+'<label>Retype Password'+'</label>'
    				+'<input type="password" class="form-control" ng-model="regData.repassword" required>'
    				+'</div>'
    			+'<div class="form-group">'
    				+'<label>Email'+'</label>'
    				+'<input type="email" class="form-control" ng-model="regData.email" required>'
    			+'</div>'
    			+'<button type="submit" class="btn btn-sm btn-info">Submit'+'</button>'+'</form>'
    			+'</div>'
    			+'</div>'
  };
});