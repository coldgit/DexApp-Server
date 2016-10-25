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
	@media screen and (min-width: 768px){.jumbotron { padding-top: 10px !important; padding-bottom: 10px  !important;}}
	</style>
</head>
<body ng-app="dexapp_server">
		<ui-view>
		</ui-view>
</body>
	<!--JavaScript-->
	 <?php foreach ($scripts as $script):?>
		<script src="<?=base_url($script); ?>"></script>
     <?php endforeach;?>

</html>