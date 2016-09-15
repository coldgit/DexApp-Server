angular.module('dexapp_server.directive',[])
.directive('logform', function() {
  return {
     restrict: 'E',
    template:
            '<span style="color:#f00;">{{error_login}}</span>'
             +'<div id="container" >'
                +'<div  ng-controller="loginCtrl">'
                +'<form ng-submit="login()">'
                +'<div class="form-group">'
                    +'<label>Username'+'</label>'
                    +'<input type="text" class="form-control" ng-model="logData.username" required>'
                +'</div>'
                +'<div class="form-group">'
                    +'<label>Password'+'</label>'
                    +'<input type="password" class="form-control" ng-model="logData.password" required>'
                +'</div>'
                +'<button type="submit" class="btn btn-sm btn-info">Submit'+'</button>'+'</form>'
                +'</div>'
                +'</div>'
  };
})
.directive('regform', function() {
  return {
  	 restrict: 'E',
    template: '<div id="container" >'
    			+'<div  ng-controller="DexApp_ctrl">'
                +'<span style="color:green;">{{success}}</span>'
    			+'<form name="regForm" ng-submit="submit()">'
    			+'<div class="form-group">'
	    			+'<label>Username '+'</label>'
                     
                    +'<span class="user-error"ng-show="regForm.username.$error.required"> is required!.</span>'
                    +'<span ng-show="!regForm.username.$error.required"><span  ng-if="checkU_Match" class="d_success"> is Available!</span>'
                      +'<span ng-if="!checkU_Match" class="user-error"> is not Available!</span>'
                  
                     +' </span>'
	    			+'<input type="text" class="form-control" name="username" ng-model="regData.username" ng-keyup="checkUsername()" required>'
    			+'</div>'
    			+'<div class="form-group">'
    				+'<label>Password '+'</label>'
                    +' <span  class="user-error" ng-show="regForm.pass.$error.required">is required!.</span>'
    				+'<input type="password" name="pass" class="form-control" ng-model="regData.password" required>'
    			+'</div>'
    			+'<div class="form-group">'
    				+'<label>Retype Password '+'</label>'

                    +'<span ng-if="!passwordmatch" class="user-error">Mismatch</span>'
    				+'<input type="password" name="repass" class="form-control" ng-model="regData.repassword" ng-keyup="check(regData)" required>'
    				+'</div>'
    			+'<div class="form-group">'
    				+'<label>Email '+'</label>'
                    +'<span  class="user-error"ng-show="regForm.email.$error.required"> is required!.</span><span ng-show="!regForm.email.$error.required"><span class="user-error"ng-show="regForm.email.$invalid"> is not valid!.</span></span></span>'
    				+'<input type="email" name="email" class="form-control" ng-model="regData.email" required>'
    			+'</div>'
    			+'<button type="submit" class="btn btn-sm btn-info">Submit'+'</button>'+'</form>'
    			+'</div>'
    			+'</div>'
  };
})
.directive('reglist',function(){
    return {
        restrict:'E',
        template:'<div class="col-md-10" ng-controller="UsersCtrl">'
        +'<table class="table table-responsive">'
                +'<thead>'
                  +'<tr>'
                    +'<th>Username</th>'
                    +'<th>Email</th>'
                    +'<th>Role</th>'
                    +'<th><input placeholder="Username"  class="form-control" type="text" name="username" ng-model="data.username"></th><th>Account Created</th>'
                    
                  +'</tr>'
            +'</thead>'
            +'<tbody>'
                +'<tr ng-repeat="x in reginfo.data.slice(((currentPage-1)*10), ((currentPage)*10)) | filter:data">'
                    +'<td>{{x.username}}</td>'
                    +'<td>{{x.email}}</td>'
                    +'<td>{{x.role}}</td>'
                    +'<td><button type="button" ng-click="deleteUser(x.username)" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button><button type="button" ng-click="getUser(x.username)" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></td>'
                    +'<td>{{x.acc_created}}</td>'
                    
                +'</tr>'
                
            +'</tbody>'
        +'</table>'
        +'<div >'             
            +'<ul uib-pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" direction-links="true" num-pages="numPages">'   
            +'</ul>'
        +'</div>'
    +'</div>'
    };
})
.directive('carousel',function(){
    return {
        restrict:'E',
        template:'<div class="col-md-7" ng-controller="CarouselDemoCtrl">'
          +'<div style="height: 305px">'
            +'<div uib-carousel active="active" interval="myInterval" no-wrap="noWrapSlides">'
              +'<div uib-slide ng-repeat="slide in slides[0] track by slide.id" index="slide.id">'
                +'<img ng-src="{{slide.image}}" style="width:650px;height:300px;margin:auto;">'
                +'<div class="carousel-caption">'
                  +'<h4>{{slide.text}}</h4>'
                +'</div>'
              +'</div>'
            +'</div>'
          +'</div>'
        +'</div>'
    };
});

