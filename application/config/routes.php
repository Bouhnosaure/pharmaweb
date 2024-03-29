<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */

$route['default_controller'] = "home";
$route['debug'] = "home/debug";
$route['contact'] = "home/contact";

$route['upload'] = "upload/index";
$route['upload/file'] = "upload/file";

$route['products'] = "products/index";
$route['products/(:num)'] = "products/index/$1";
$route['products/cat/(:num)'] = "products/cat/$1";
$route['products/cat/(:num)/(:num)'] = "products/cat/$1/$2";
$route['products/detail/(:num)'] = "products/detail/$1";

$route['categories'] = "home/notfound";
$route['categories_json'] = "categories/index";

$route['cart'] = "cart/index";
$route['cart/add'] = "cart/add";
$route['cart/update'] = "cart/update";
$route['cart/destroy'] = "cart/destroy";
$route['cart/getcart'] = "cart/getcart";
$route['cart/gettotal'] = "cart/gettotal";

$route['user'] = "user/index";
$route['user/login'] = "user/login";
$route['user/logout'] = "user/logout";
$route['user/register'] = "user/register";
$route['user/resetpassword'] = "user/reset";
$route['user/edit'] = "user/edit";
$route['user/success'] = "user/success";


$route['autocomplete/cities'] = "autocomplete/cities";
$route['autocomplete/mutuals'] = "autocomplete/mutuals";
$route['autocomplete/medics'] = "autocomplete/medics";
$route['autocomplete/mutualscenters'] = "autocomplete/mutualscenters";

$route['assets/(:any)'] = 'assets/$1';
$route['404_override'] = 'home/notfound';


/* End of file routes.php */
/* Location: ./application/config/routes.php */