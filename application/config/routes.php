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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Public Routes */
$route['beranda'] = 'Home/index';
$route['produk'] = 'Products/index';
$route['produk/(:any)'] = 'Products/detail/$1';
$route['products'] = 'Products/index';
$route['products/(:any)'] = 'Products/detail/$1';
$route['tentang-kami'] = 'About/index';
$route['about'] = 'About/index';

/* Cart & WhatsApp Checkout Routes */
$route['keranjang'] = 'Cart/index';
$route['cart'] = 'Cart/index';
$route['cart/add'] = 'Cart/add';
$route['cart/update'] = 'Cart/update';
$route['cart/remove/(:any)'] = 'Cart/remove/$1';
$route['cart/clear'] = 'Cart/clear';
$route['cart/checkout'] = 'Cart/checkout';

/* Admin Auth Routes */
$route['login'] = 'Auth/login';
$route['logout'] = 'Auth/logout';
$route['admin/login'] = 'Auth/login';
$route['admin/logout'] = 'Auth/logout';

/* Admin Panel Routes */
$route['admin'] = 'admin/Dashboard/index';
$route['admin/dashboard'] = 'admin/Dashboard/index';

$route['admin/categories'] = 'admin/Categories/index';
$route['admin/categories/create'] = 'admin/Categories/create';
$route['admin/categories/store'] = 'admin/Categories/store';
$route['admin/categories/edit/(:num)'] = 'admin/Categories/edit/$1';
$route['admin/categories/update/(:num)'] = 'admin/Categories/update/$1';
$route['admin/categories/delete/(:num)'] = 'admin/Categories/delete/$1';

$route['admin/products'] = 'admin/Products/index';
$route['admin/products/create'] = 'admin/Products/create';
$route['admin/products/store'] = 'admin/Products/store';
$route['admin/products/edit/(:num)'] = 'admin/Products/edit/$1';
$route['admin/products/update/(:num)'] = 'admin/Products/update/$1';
$route['admin/products/delete/(:num)'] = 'admin/Products/delete/$1';

$route['admin/settings'] = 'admin/Settings/index';
$route['admin/settings/update'] = 'admin/Settings/update';
