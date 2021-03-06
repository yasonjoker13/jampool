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
$route['default_controller'] = 'ventas';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['perfil'] = 'user_session/perfil';
$route['ventas/reportes'] = 'home';
$route['reportes/resumen-diario'] = 'reportes/resumen_diario';
$route['reportes/resumen-por-fecha'] = 'reportes/resumen_fecha';
$route['reportes/usuarios-diaros'] = 'reportes/usuarios_diario';
$route['reportes/usuarios-por-fecha'] = 'reportes/usuarios_fecha';
$route['reportes/ticket-nulos'] = 'reportes/ticket_nulos';
$route['reportes/ticket-ganados'] = 'reportes/ticket_ganados';
$route['reportes/ticket-pagados'] = 'reportes/ticket_pagados';
$route['login'] = 'user_session/index';
$route['logout'] = 'user_session/logout';
$route['register'] = 'user_session/sign_up';
$route['recover'] = 'user_session/forgot_password';
$route['ventas/detalles-ticket/(:num)'] = 'ventas/ticket_detalles/$1';
$route['configuracion/agregar-usuario'] = 'configuracion/agg_user';
$route['configuracion/editar-user/(:any)'] = 'configuracion/edit_user/$1';