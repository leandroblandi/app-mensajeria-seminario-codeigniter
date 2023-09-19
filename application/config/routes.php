<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'LoginController/registerView';

$route['login'] = 'LoginController/loginView';
$route['register'] = 'LoginController/registerView';

$route['auth'] = 'LoginController/login';
$route['new'] = 'LoginController/register';

$route['chat'] = 'ChatController';
$route['chat/message'] = 'ChatController/message';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
