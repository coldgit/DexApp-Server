var base_url = window.location.protocol+'//'+window.location.host;
console.log(base_url);

angular.module('dexapp_server.services', [])

.factory('UsersList', function($http,$httpParamSerializerJQLike,$rootScope) {
 
   return {
    submit:function(data)
    {
        console.log(data);
        var url = base_url+'/DexApp-Server/DexApp/regAuth';
        $http({
          method:'POST',
          url: url,
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
          data:$httpParamSerializerJQLike(data),
        }).then(
          function(resp){
          console.log(resp.data.data);
          $rootScope.reginfo = resp.data;
          $rootScope.regData = {};
        },
          function(err){
          console.log(err);
        });
    },
  getUsers:function()
  {
      var url = base_url+'/DexApp-Server/dexapp/registered';
       $http({
           method:'GET',
           url:url,
           headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
         }).then(
           function(resp){
               console.log(resp.data.data.length);
               $rootScope.reginfo = resp.data;
               $rootScope.totalItems = resp.data.data.length;
               $rootScope.currentPage = 1;
               $rootScope.maxSize = 5;
           },
           function(err){
             console.log(err);
           });
  },
  deleteUser:function(username)
  {
      var url = base_url+'/DexApp-Server/dexapp/deleteUser/';
         $http({
          method:'DELETE',
          url:url+username,
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
        }).then(
          function(resp){
              console.log(resp.data.data.length);
              $rootScope.reginfo = resp.data;
          },
          function(err){
            console.log(err);
          });
  }
  
}

});