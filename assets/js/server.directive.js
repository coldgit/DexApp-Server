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
                +'<tr ng-repeat="x in reginfo.slice(((currentPage-1)*10), ((currentPage)*10)) | filter:data">'
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
}).directive('newanime',function(){
    return{
        restrict:'E',
        template:   '<div class="col-md-4" ng-controller="AnimeCtrl">'
                      +'<form enctype="multipart/form-data" ng-submit="submit_anime()" >'
                        +'<div class="form-group">'
                            +'<label>Title</label>'
                            +'<input class="form-control" type="text" name="title" ng-model="animeData.ani_title" required>'
                        +'</div>'
                        +'<div class="form-group">'
                             +'<label>Summary</label>'
                              +'<textarea class="form-control" ng-model="animeData.summary" rows="5"></textarea>'
                        +'</div>'
                        +'<div class="form-group">'
                            +'<input type="file" name="userfile" id="f" ng-model="itemData.userfile" onchange="angular.element(this).scope()._img()">'
                            +'<img width="128px" height="128px" src="uploads/{{image}}">'
                        +'</div>'
                        +'<button type="submit" class="btn btn-sm btn-info">Submit</button>'
                      +'</form>'
                    +'</div>'
    }
})
.directive('listanime',function(){
    return{
      restrict:'E',
        template: '<div class="col-md-7" ng-controller="AnimeCtrl">'
                        +'<table class="table table-reponsive">'
                            +'<thead>'
                                +'<tr>'
                                    +'<th>title</th>'
                                    +'<th>Date Time</th>'
                                    +'<th>Actions</th>'
                                +'</tr>'
                            +'</thead>'
                            +'<tbody>'
                                +'<tr ng-repeat="x in animes.slice(((currentPage-1)*10), ((currentPage)*10))">'
                                    +'<td>{{x.ani_title}}</td>'
                                    +'<td>{{x.date_time}}</td>'
                                    +'<td><button type="button" ng-click="delete_anime(x.ani_url)" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button></td>'
                                +'</tr>'
                            +'</tbody>'
                        +'</table>'
                    +'<div >'     
                        +'<ul uib-pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" direction-links="true" num-pages="numPages"></ul>'
                    +'</div>'
    }
})
.directive('newepisode',function(){
    return{
      restrict:'E',
        template:  '<div class="col-md-3" ng-controller="EpisodeCtrl">'
                        +'<form enctype="multipart/form-data" ng-submit="episode()">'
                            +'<div class="form-group">'
                                +'<label>Title</label>'
                                +'<select class="form-control" ng-model="title.ani_title" ng-options="anime.ani_title as anime.ani_title for anime in animes" reuired></select>'
                            +'</div>'
                             +'<div class="form-group">'
                                +'<label>Episode</label>'
                                +'<input type="text" name="episode" ng-model="Episode.episode" required>'
                            +'</div>'
                            +'<div class="form-group">'
                                +'<input type="file" name="userfile" id="video" ng-model="Episode.userfile" onchange="angular.element(this).scope()._video()">'
                            +'</div>'
                                +'<button type="submit" ng-disabled="vid" class="btn btn-sm btn-info">Submit</button>'
                        +'</form>'
                    +'</div>'
    }
})
.directive('listepisode',function(){
    return{
        restrict:'E',
        template: '<div class="col-md-7" ng-controller="EpisodeCtrl">'
                    +'<div class="form-group">'
                        +'<label>Title</label>'
                        +'<select class="form-control" ng-model="title.ani_title" ng-options="anime.ani_title as anime.ani_title for anime in animes" ng-change="list_episodes(title.ani_title)" required></select>'
                    +'</div>'
                    +'<table class="table table-reponsive">'
                        +'<thead>'
                            +'<tr>'
                                +'<th>Episode</th>'
                                +'<th>Date Time</th>'
                                +'<th>Actions</th>'
                            +'</tr>'
                        +'</thead>'
                        +'<tbody>'
                            +'<tr ng-repeat="x in episodes.slice(((currentPage-1)*10), ((currentPage)*10))">'
                                +'<td>{{x.episode}}</td>'
                                +'<td>{{x.date_time}}</td>'
                                +'<td><td><button type="button" ng-click="delete_episode(title.ani_title,x.episode)" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button></td>'
                            +'</tr>'
                        +'</tbody>'
                    +'</table>'
                    +'<div>'            
                    +'<ul uib-pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" direction-links="true" num-pages="numPages"></ul>'
                    +'</div>'
                    +'</div> '
    }
})
.directive('adminnav',function(){
    return{
        restrict:'E',
        template:'<nav class="navbar navbar-inverse">'
                    +'<div class="container">'
                        +'<div class="container-fluid">'
                            +'<div class="navbar-header">'
                                +'<a class="navbar-brand" href="#/admin">DexApp</a>'
                            +'</div>'
                        +'<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">'
                            +'<ul class="nav navbar-nav navbar-right">'
                                +'<li><a href="#/anime">Animes</a></li>'
                                +'<li><form class="navbar-form navbar-left"><div class="form-group"><input type="text" class="form-control" placeholder="Search"></div></form></li>'
                                +'<li><a ng-submit="logout()" href="#">Logout</a></li>'
                            +'</ul>'
                        +'</div>'
                        +'</div>'
                    +'</div>'  
                +'</nav>'
    }
})
.directive('usernav',function(){
    return{
        restrict:'E',
        template:'<nav class="navbar navbar-inverse">'
                    +'<div class="container">'
                        +'<div class="container-fluid">'
                            +'<div class="navbar-header">'
                                +'<a class="navbar-brand" href="#/client">DexApp</a>'
                            +'</div>'
                        +'<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">'
                            +'<ul class="nav navbar-nav navbar-right">'
                                +'<li><a href="#/anime">Animes</a></li>'
                                +'<li><form class="navbar-form navbar-left"><div class="form-group"><input type="text" class="form-control" placeholder="Search"></div></form></li>'
                                +'<li><a ng-submit="logout()" href="#">Logout</a></li>'
                            +'</ul>'
                        +'</div>'
                        +'</div>'
                    +'</div>'  
                +'</nav>'
    }
});
