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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['list_barang']                   = 'admin/ListBarang';
$route['admin']                         = 'admin/C_Admin';
$route['opname']                        = 'admin/StkOpname';
$route['user']                          = 'admin/user';
$route['data_zahir']                    = 'admin/Data_zahir';
$route['logout']                        = 'login/logout';
$route['match_progress']                = 'admin/C_matchProgress';
$route['addBarang']                     = 'admin/ListBarang/addBarang';
$route['faktur_pending']                = 'admin/FakturPending';
$route['quick_count']                   = 'admin/C_summaryOpaname';
$route['stock_controller']              = 'admin/C_summaryOpaname/stock_controller';
$route['stock_tracing/(:any)']          = 'admin/C_summaryOpaname/detail_stock_controller/$1';

$route['dashboarduser']                 = 'admin/C_Dashboarduser';
$route['u_opname']                      = 'admin/StkOpname';
$route['u_match_progress']              = 'admin/C_matchProgressuser';
$route['u_list_barang']                 = 'admin/C_listBarang';
$route['u_list_barang1']                = 'admin/C_listBarang/get_data_user';
$route['addopname']                     = 'admin/StkOpname/add_opname_user';
$route['selectbarang']                  = 'admin/StkOpname/selectbarang';
$route['get_data_barang']               = 'admin/StkOpname/get_data_barang';
$route['get_exp']                       = 'admin/StkOpname/get_exp';
$route['detail_input/(:any)/(:any)']    = 'admin/C_matchProgressuser/detail_input/$1/$2';
$route['input_edit/(:any)']             = 'admin/C_matchProgressuser/input_edit/$1';
