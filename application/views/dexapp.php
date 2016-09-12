<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to CodeIgniter</title>
	
	<!--CSS-->
	 <?php foreach ($css as $style):?>
		<link rel="stylesheet" type="text/css" href="<?=base_url($style);?>">
     <?php endforeach;?>
	
	<style type="text/css">
	@import 'https://fonts.googleapis.com/css?family=Titillium+Web';
	body{font-family: 'Titillium Web', sans-serif;}
	.title-home{text-align: center;color: rgb(72,72,72) !important;font-weight: bold;font-size: 50px;font-style: normal;}
	.logo{height:10%;width: 10%;}
	.logo:hover{opacity: 0.8}
	
	</style>
</head>
<body ng-app="dexapp_server">
<div class="container">
	
	<!-- <div >

		<h1  class="title-home">Welcome to <img class="logo"src="<?//=base_url('uploads/img/logo.png');?>"></h1>
	</div> -->
	<regform></regform>
	<div class="col-md-10" ng-controller="UsersCtrl">

			
		<table class="table table-responsive">
				<thead>
			      <tr>
			        <th>Username</th>
			        <th>Email</th>
			        <th>Role</th>
			        <th><input placeholder="Username" class="form-control" type="text" name="username" ng-model="data.username"></th><th>Account Created</th>
			        
			      </tr>
		    </thead>
		    <tbody>
		    	<tr ng-repeat="x in reginfo.data.slice(((currentPage-1)*10), ((currentPage)*10)) | filter:data">
		    		<td>{{x.username}}</td>
		    		<td>{{x.email}}</td>
		    		<td>{{x.role}}</td>
		    		<td><a href="	#">delete</a></td>
		    		<td>{{x.acc_created}}</td>
		    		
		    	</tr>
		    	
		    </tbody>
		</table>
		<div >				
			
				   <ul uib-pagination 
				    	total-items="totalItems" 
				    	ng-model="currentPage" 
				    	max-size="maxSize" 
				    	class="pagination-sm" 
				    	direction-links="true" 
				    	num-pages="numPages">
				    </ul>
				</div>
	</div>
</div>

</body>
	<!--JavaScript-->
	 <?php foreach ($scripts as $script):?>
		<script src="<?=base_url($script); ?>"></script>
     <?php endforeach;?>

</html>