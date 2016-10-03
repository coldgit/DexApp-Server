var base_url = window.location.protocol+'//'+window.location.host;
console.log(base_url);
angular.module('dexapp_server.services', [])

.factory('UsersList', function($http,$httpParamSerializerJQLike,$rootScope) {
    
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
    submit:function(data)
    {
       
        var url = base_url+'/DexApp-Server/users';
        $http({
          method:'POST',
          url: url,
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
          data:$httpParamSerializerJQLike(data),
        }).then(
          function(resp){
          console.log(resp.data);
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
             headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
           }).then(
             function(resp){
                 console.log(resp.data.length);
                 $rootScope.reginfo = resp.data;
                 $rootScope.totalItems = resp.data.length;
                 $rootScope.currentPage = 1;
                 $rootScope.maxSize = 5;
             },
             function(err){
               console.log(err);
             });
    },
    deleteUser:function(username)
    {
        var url = base_url+'/DexApp-Server/users/';
           $http({
            method:'DELETE',
            url:url+username,
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
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
            headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
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
      console.log(data);
      var url = base_url+'/DexApp-Server/auth';
           $http({
              method:'POST',
              url:url,
              headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
              data:$httpParamSerializerJQLike(data),
            }).then(
              function(resp){
                  console.log(resp.data);
                 // $rootScope.error_login = resp.data.err.error_login;
              },
              function(err){
                  console.log(err.data.err);
                  $rootScope.error_login = err.data.err.error_login;
              });
    },
    check:function(username){
       $http({
             method:'GET',
             url:base_url+'/DexApp-Server/dexapp/Checker?username='+username,
            // headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
          //   params:{username:username},
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

});