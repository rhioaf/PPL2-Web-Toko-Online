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
// Default route setting
$route['default_controller'] = 'c_barang/display';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route Barang
$route['display_barang'] = 'c_barang/display';

// Route Cart
$route['display_cart'] = 'c_cart/display';
$route['add_to_cart'] = 'c_cart/store';
$route['clear_cart'] = 'c_cart/clearCart';
$route['clear_one_from_cart/(:num)'] = 'c_cart/clearAnItemFromCart/$1';
$route['add_amount/(:num)'] = 'c_cart/addOneAmountAnItemInCart/$1';
$route['reduce_amount/(:num)'] = 'c_cart/reduceOneAmountAnItemInCart/$1';

// Route Penjualan
$route['checkout'] = 'c_penjualan/store';
$route['invoice'] = 'c_penjualan/invoice';
$route['penjualan'] = 'c_penjualan/display';
$route['checkout_form'] = 'c_penjualan/checkout';
// $route['gen_excel'] = 'c_penjualan/exportToExcel';
$route['gen_excel'] = 'c_penjualan/exportToExcelv2';
$route['gen_pdf'] = 'c_penjualan/exportToPDF';


