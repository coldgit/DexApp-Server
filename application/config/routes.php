<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dexapp';

$route['users?(:any)'] = 'dexapp/users/$1';

$route['login']['POST'] = 'dexapp/login/';

$route['checkusersname?(:any)']['GET'] = 'dexapp/checkusername/$1';


//DELETE METHOD
// $route['delete?(:any)']['DELETE'] = 'dexapp/deleteUser/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// 		ROUTES													RESOURCE												METHOD				DESCRIPTION							
// $route['regauth']['POST'] = 'dexapp/regAuth'; 					localhost/DexApp-Server/regauth  						POST			add new data of the users				
// $route['login']['POST'] = 'dexapp/login/';						localhost/DexApp-Server/login							POST			authenticate the data of login
	
// $route['reglist']['GET'] = 'dexapp/registered';					localhost/DexApp-Server/reglist							GET			list of the registered users
// $route['user?(:any)']['GET'] = 'dexapp/getUser/$1';				localhost/DexApp-Server/user?username=dexter1231		GET			get the info of the user 					
// $route['checkuser?(:any)']['GET'] = 'dexapp/checkusername/$1';	localhost/DexApp-Server/checkuser?username=dexter1231	GET			check the availability of the username

// $route['delete?(:any)']['DELETE'] = 'dexapp/deleteUser/$1';		localhost/DexApp-Server/delete?username=dexter1231		DELETE			remove certain user account via username
