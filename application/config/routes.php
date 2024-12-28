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


$route['list_barang']                   = 'ListBarang';
$route['admin']                         = 'C_Admin';
$route['opname']                        = 'C_Stkopname';
$route['user']                          = 'User';
$route['Adduser']                       = 'User/Adduser';
$route['data_zahir']                    = 'Data_zahir';
$route['logout']                        = 'login/logout';
$route['match_progress']                = 'C_Matchprogress';
$route['addBarang']                     = 'C_Listbarangss/addBarang';
$route['faktur_pending']                = 'C_Fakturpending';
$route['quick_count']                   = 'C_Summaryopaname';
$route['stock_controller']              = 'C_Summaryopaname/stock_controller';
$route['stock_controller/adjustmen']    = 'C_Summaryopaname/addjustment_controll';
$route['stock_controller/adjustmentadd'] = 'C_Summaryopaname/adjustmentadd';
$route['stock_tracing/(:any)']          = 'C_Summaryopaname/detail_stock_controller/$1';

$route['dashboarduser']                 = 'C_Dashboarduser';
$route['u_opname']                      = 'C_Stkopname';
$route['u_match_progress']              = 'C_Matchprogressuser';
$route['u_list_barang']                 = 'C_Listbarangss';
$route['u_list_barang1']                = 'C_Listbarangss/get_data_user';
$route['addopname']                     = 'C_Stkopname/add_opname_user';
$route['selectbarang']                  = 'C_Stkopname/selectbarang';
$route['get_data_barang']               = 'C_Stkopname/get_data_barang';
$route['get_exp']                       = 'C_Stkopname/get_exp';
$route['detail_input/(:any)/(:any)']    = 'C_Matchprogressuser/detail_input/$1/$2';
$route['input_edit/(:any)']             = 'C_Matchprogressuser/input_edit/$1';
$route['excelallbarang']                = 'C_Matchprogressuser/excelAllBarang';
$route['excelfefo']                     = 'C_Matchprogressuser/excelfefo';
