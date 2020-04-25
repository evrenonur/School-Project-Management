<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['logout'] = "Home/logout";
$route['login/auth'] = "Login/auth";
$route['login'] = "Login/auth";
$route['onay/(:any)'] = "Login/onay";




