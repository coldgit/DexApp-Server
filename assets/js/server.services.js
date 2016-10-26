var base_url = window.location.protocol+'//'+window.location.host;
var Guest_token = 'eyJ0eXAiOiJqd3QiLCJhbGciOiJIUzI1NiJ9.eyJyb2xlIjoiR3Vlc3QiLCJpc3N1ZWRBdCI6IjIwMTYtMTAtMjZUMjM6Mzc6MjArMDIwMCIsInR0bCI6IiA4NjQwMCJ9.NkHSOMJ4946f5XMI-XQEqySqJooYHj9ZWHnL63EpCeo@R3Vlc3Q=';
angular.module('dexapp_server.services', [])
.factory('UsersList', function($location,$http,$httpParamSerializerJQLike,$rootScope) {
    
    var img = [{ image: base_url+'/DexApp-Server/uploads/img/1-op.jpg',id:0,text:'One Piece'},
                { image: base_url+'/DexApp-Server/uploads/img/2-nanatsu.jpg',id:1,text:'Nanatsu No Taizai'},
                { image: base_url+'/DexApp-Server/uploads/img/3-opm.jpg',id:2,text:'One Punch Man'},
                { image: base_url+'/DexApp-Server/uploads/img/4-ngnl.jpg',id:3,text:'No Game No Life'},
                { image: base_url+'/DexApp-Server/uploads/img/5-shokugeki.jpg',id:4,text:'Shokugeki No Souma'},
              ];
return {
    img:function()
    {
      return img;
    },
    submit:function(data)//done token
    {
       var url = base_url+'/DexApp-Server/users';
        $http({
          method:'POST',
          url: url,
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded','x-token':Guest_token},
          data:$httpParamSerializerJQLike(data),
        }).then(
          function(resp){
          $rootScope.success = resp.data.success;
          $rootScope.reginfo = resp.data;
          $rootScope.regData = {};
        },
          function(err){
          console.log(err);
        });

    },
    getUsers:function()
    {
        var url = base_url+'/DexApp-Server/users/';
         $http({
             method:'GET',
             url:url,
             headers: { 'Content-Type' : 'application/x-www-form-urlencoded' ,'x-token':$rootScope.Auth_key},
           }).then(
             function(resp){
                 console.log(resp.data.length);
                 $rootScope.reginfo = resp.data;
                 $rootScope.totalItems = resp.data.length;
                 $rootScope.currentPage = 1;
                 $rootScope.maxSize = 5;
             },
             function(resp){
               console.log(resp);
             });
    },
    deleteUser:function(username)
    {
       var url = base_url+'/DexApp-Server/users/';
           $http({
            method:'DELETE',
            url:url+username,
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded','x-token':$rootScope.Auth_key },
          }).then(
            function(resp){
                console.log(resp.data.length);
                $rootScope.reginfo = resp.data;
            },
            function(err){
              console.log(err);
            });
    },
    getUser:function(username) //get single info in users list
    {
      var url = base_url+'/DexApp-Server/users/'+username;
           $http({
            method:'GET',
            url:url,
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded','x-token':$rootScope.Auth_key },
          }).then(
            function(resp){
                console.log(resp.data[0]);
                
            },
            function(err){
              console.log(err);
            });
    },
    login:function(data)
    { 
      var url = base_url+'/DexApp-Server/auth';
           $http({
              method:'POST',
              url:url,
              headers: { 'Content-Type' : 'application/x-www-form-urlencoded','x-token':Guest_token },
              data:$httpParamSerializerJQLike(data),
            }).then(
              function(resp){
                console.log(resp.headers()['x-token']);
                $rootScope.Auth_key = resp.headers()['x-token'];
                  // console.log(resp.data.credentials);
                  $rootScope.Credentials = resp.data.credentials;
                   $location.path(resp.data.location);
                  $rootScope.$broadcast();
                 // $rootScope.error_login = resp.data.err.error_login;
              },
              function(err){
                  console.log(err.data);
                  $rootScope.error_login = err.data.err.error_login;
              });
    },
    check:function(username)//done token
    {
       $http({
             method:'GET',
             url:base_url+'/DexApp-Server/dexapp/Checker?username='+username,
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded','x-token':Guest_token },
            params:{username:username},
           }).then(
             function(resp){
                 console.log(resp.data);
                 if(resp.data.check)
                 {
                  $rootScope.checkU_Match = resp.data.check;
                 }else{
                  $rootScope.checkU_Match = resp.data.check;
                 }
             },
             function(err){
               console.log(err);
             });
    }
  
} 

})
.factory('Anime',function($http,$httpParamSerializerJQLike,$rootScope,$location){
  return {
    uploadImg_anime:function(fd)
            {
            $http({
                method: 'POST',
                url: 'http://localhost/DexApp-Server/upload/do_upload',
                withCredentials: true,
                headers: { 'Content-Type': undefined },
                transformRequest: angular.identity,
                data: fd
              }).then(function(resp){
                console.log(resp.data);
                $rootScope.image = resp.data.upload_data.file_name;
              },function(err){
                console.log(err.data);
              }); 
          },
    new_anime:function(data)
    {
       var url = base_url+'/DexApp-Server/anime';
           $http({
            method:'POST',
            url:url,
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded' ,'x-token':$rootScope.Auth_key},
            data:$httpParamSerializerJQLike(data),
          }).then(
            function(resp){
                console.log(resp);
                $rootScope.animes = resp.data
            },
            function(err){
              console.log(err);
          });
    },
    list_anime:function() 
    {
      $http({
             method:'GET',
             url: base_url+'/DexApp-Server/anime',
             headers: { 'Content-Type' : 'application/x-www-form-urlencoded','x-token':$rootScope.Auth_key },
           }).then(
             function(resp){
                 console.log(resp.data);
                 $rootScope.animes = resp.data;
                 $rootScope.totalItems = resp.data.length;
                 $rootScope.currentPage = 1;
                 $rootScope.maxSize = 5;
             },
             function(err){
               console.log(err.status);
             });
   },
   delete_anime:function(ani_title)
   {
     $http({
            method:'DELETE',
            url:base_url+'/DexApp-Server/anime/'+ani_title,
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded' ,'x-token':$rootScope.Auth_key},
          }).then(
            function(resp){
                console.log(resp.data.length);
                $rootScope.animes = resp.data;
            },
            function(err){
              console.log(err);
            });
   },
   get_anime:function(title)
   {
    $http({
             method:'GET',
             url: base_url+'/DexApp-Server/anime/'+title,
             headers: { 'Content-Type' : 'application/x-www-form-urlencoded','x-token':$rootScope.Auth_key },
           }).then(
             function(resp){
                 console.log(resp.data[0]);
                 $rootScope.anime = resp.data[0];
                 $location.path('anime/'+$rootScope.anime.ani_url);
             },
             function(err){
               console.log(err);
             });
   }
  }
})
.factory('Episode',function($http,$httpParamSerializerJQLike,$rootScope,$location){
  return {
    uploadVideo_anime:function(fd)
            {
            $http({
                method: 'POST',
                url: 'http://localhost/DexApp-Server/upload/do_upload',
                withCredentials: true,
                headers: { 'Content-Type': undefined },
                transformRequest: angular.identity,
                data: fd
              }).then(function(resp){
                console.log(resp.data);
                $rootScope.video = resp.data.upload_data.file_name;
                $rootScope.vid = false;
              },function(err){
                console.log(err);
              }); 
          },
    new_episode:function(anime,data)
    {
      console.log('add anime episode- '+$rootScope.Auth_key);
      var url = base_url+'/DexApp-Server/anime/'+anime+'/episodes';
           $http({
            method:'POST',
            url:url,
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded','x-token':$rootScope.Auth_key},
            data:$httpParamSerializerJQLike(data),
          }).then(
            function(resp){
                console.log(resp);
            },
            function(err){
              console.log(err);
          });
    },
    list_episodes:function(anime)
    {
      console.log('list anime episode- '+$rootScope.Auth_key);
      $http({
             method:'GET',
             url: base_url+'/DexApp-Server/anime/'+anime+'/episodes',
             headers: { 'Content-Type' : 'application/x-www-form-urlencoded','x-token':$rootScope.Auth_key},
           }).then(
             function(resp){
                 console.log(resp.data);
                 $rootScope.episodes = resp.data;
                 $rootScope.totalItems = resp.data.length;
                 $rootScope.currentPage = 1;
                 $rootScope.maxSize = 5;
             },
             function(err){
               console.log(err);
             });
    },
    delete_episode: function(title,id)
    {
      $http({
            method:'DELETE',
            url:base_url+'/DexApp-Server/anime/'+title+'/episode/'+id,
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded','x-token':$rootScope.Auth_key},
          }).then(
            function(resp){
                console.log(resp.data);
                $rootScope.episodes = resp.data;
            },
            function(err){
              console.log(err);
            });
    },
   get_episode:function(title,id)
   {
   $http({
             method:'GET',
             url: base_url+'/DexApp-Server/anime/'+title+'/episode/'+id,
             headers: { 'Content-Type' : 'application/x-www-form-urlencoded' ,'x-token':$rootScope.Auth_key},
           }).then(
             function(resp){
                 console.log(resp.data[0]);
                 $rootScope.episode = resp.data[0];
                 $location.path('anime/'+$rootScope.episode.ani_url+"/episode/"+$rootScope.episode.episode);
                
             },
             function(err){
               console.log(err);
             });

   }
  }
})
.factory('Comment_',function($http,$httpParamSerializerJQLike,$rootScope){
  return{

  }
})
.factory('AuthService',function($http,$httpParamSerializerJQLike,$rootScope){
  $rootScope.Credentials = {};
  $rootScope.LogOut = true;
   $rootScope.$broadcast();
  return{
        isAuthenticated:function()
        {
            if(angular.equals($rootScope.Credentials, {}))
            {
              return false;
            }else{
              return true;
            }
          },
        isLogout:function()
        {
          return $rootScope.LogOut;
        }
    }
});