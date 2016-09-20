<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to DexApp</title>
	
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
	.user-error{color:#f00;}
	.d_success{color:green;}
	</style>
</head>
<body ng-app="dexapp_server">
	<div class="container">
<<<<<<< HEAD
		<div class="jumbotron" >

			<h1  class="title-home">Welcome to <img class="logo"src="<?=base_url('uploads/img/logo.png');?>"></h1>
		</div>
		<div class="row">
			<carousel></carousel>
=======
		<!-- <div class="jumbotron" >

			<h1  class="title-home">Welcome to <img class="logo"src="<?=base_url('uploads/img/logo.png');?>"></h1>
		</div> -->
		<div class="row">
			<!-- <carousel></carousel> -->
>>>>>>> 58897e094e7362cb1c5f10b5a9767d1a4d6bfed0
			<div class="col-md-5">
				 <form name="outerForm" class="tab-form-demo">
				    <uib-tabset active="activeForm">
				      <uib-tab index="0" heading="Login">
				      	<br>
				      	<logform></logform>
				      </uib-tab>
				      <uib-tab index="1" heading="Register Now!">
				      <br>
				        <regform></regform>
				      </uib-tab>
				      	
				    </uib-tabset>
				  </form>

			</div>
		
		</div>	
</div>
<<<<<<< HEAD
<!-- 		
		<reglist></reglist> -->
=======
		
		<reglist></reglist>
>>>>>>> 58897e094e7362cb1c5f10b5a9767d1a4d6bfed0
	</div>
</body>
	<!--JavaScript-->
	 <?php foreach ($scripts as $script):?>
		<script src="<?=base_url($script); ?>"></script>
     <?php endforeach;?>

</html>