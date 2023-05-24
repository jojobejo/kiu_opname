<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'login';
$route['list_barang'] = 'C_Admin/ListBarang';
$route['admin'] = 'C_Admin/admin';
$route['opname'] = 'C_Admin/StkOpname';
$route['user'] = 'C_Admin/user';
$route['data_zahir'] = 'C_Admin/Data_zahir';
$route['logout'] = 'login/logout';
$route['match_progress'] = 'C_Admin/C_matchProgress';
$route['quick_count'] = 'C_Admin/C_summaryOpaname';
$route['addBarang'] = 'C_Admin/ListBarang/addBarang';
$route['def_user'] = 'C_User/Def_user';
$route['u_opname'] = 'C_User/StkOpname';
$route['faktur_pending'] = 'C_Admin/FakturPending';
$route['u_match_progress'] = 'C_User/C_matchProgress';
$route['u_list_barang'] = 'C_User/C_listBarang';
$route['u_list_barang1'] = 'C_User/C_listBarang/get_data_user';
$route['getBarangServer'] = 'C_User/StkOpname/get_list_barang_opname';
$route['getBarangOpname/(:any)'] = 'C_User/StkOpname/getDataBarang/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
