<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Function routes
$route['user/login'] = 'functions/user_login';

// Page routes
$route['default_controller'] = 'pages';

// Defaults
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
