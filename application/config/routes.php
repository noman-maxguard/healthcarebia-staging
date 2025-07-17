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
$route['default_controller'] = 'welcome';
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;

//Custom routes Backend

//My routes
$route['admin'] = 'admin/home';

//Login
$route['admin/login'] = 'admin/login';

$route['admin/reset-password'] = 'admin/login/ResetPassword';
$route['admin/set-password'] = 'admin/login/SetPassword';

//Settings
$route['admin/settings'] = 'admin/settings';
$route['admin/email-settings'] = 'admin/settings/settings_email';
$route['admin/account'] = 'admin/profile';

//User agent
$route['admin/user-log'] = 'admin/profile/user_log';

//Gallery
$route['admin/manage-album'] = 'admin/gallery/album';
$route['admin/upload-album'] = 'admin/gallery/new_album';

$route['admin/view-album/:num'] = 'admin/gallery/view_album';
$route['admin/upload-album-image/:num'] = 'admin/gallery/new_album_image';

$route['delete-album/:num'] = 'admin/gallery/delete_album';
$route['delete-album-image/:num'] = 'admin/gallery/delete_image';


//////////////////////////////////////////////////////////////////////




//Enquiries
$route['admin/enquiries'] = 'admin/enquiries';
$route['admin/appointments'] = 'admin/enquiries_app';

//Export Enquiries
$route['admin/export-enquiries'] = 'admin/settings/exportToExcel';
$route['admin/export-appointments'] = 'admin/settings/exportToExcel_app';

//Common Pages
$route['admin/manage-pages'] = 'admin/settings/pages';
$route['admin/manage-pages/:num'] = 'admin/settings/pages';

//Common Pages
//$route['admin/manage-seo/:num'] = 'admin/settings/seo';

//Home Page
//$route['admin/manage-home-page'] = 'admin/settings/home_page';

//About us
//$route['admin/manage-about-us'] = 'admin/settings/about_us';

//common_contents
//$route['admin/manage-common-contents'] = 'admin/settings/common_contents';

//Media common
//$route['admin/media'] = 'admin/media';




///////////////////////////////////////////////////////////////////////
//Custom routes Frontend
//Home
$route['home'] = 'welcome';

//Captcha
$route['mycaptcha/:any'] = 'welcome/mycaptcha_contact';

$route['blog-details'] = 'welcome/blog_details';

$route['booking/contact'] = 'booking/contact';
$route['booking/appointments'] = 'booking/appointments';
$route['ebooks/download'] = 'ebooks/download';






$route[':any'] = 'welcome/pages_details';




//$route['electric-guitar'] = 'welcome/electric_guitar';







