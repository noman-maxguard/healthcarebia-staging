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
|	https://codeigniter.com/userguide3/general/routing.html
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


$route['default_controller'] = 'welcome';
$route['admin']       ='admin/dashboard';
$route['auth']        ='admin/login/auth';
$route['admin/logout']='admin/login/logout';
$route['customers']   ='admin/common/customers';
$route['user-profile']='admin/common/user_profile';
$route['admin/userlog']='admin/user_log';
$route['admin/product-type']='admin/product_type';
$route['admin/dashboard']='admin/dashboard';
$route['backup']='backup';
$route['manage-pages/save_page/(:any)']='admin/manage_page/save_page/$1';
$route['manage-pages/update_page/(:any)']='admin/manage_page/update_page/$1';
$route['setup-menu']='admin/menu/add_menu';
$route['setup-menu/(:any)']='admin/menu/edit_menu/$1';


$route['admin/setup-service/(:any)']='admin/service/edit/$1';



// $route['blog']='welcome/blog/';
// $route['blog/page/(:num)']='welcome/blog/$1';
// $route['blog/(:any)']='welcome/blog_details/$1';

$route['(:any)']='welcome/index/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;




