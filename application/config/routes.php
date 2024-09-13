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
//die;

$route['default_controller'] = 'home';

$route['admin'] = 'admin/dasoard';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;


// Admin Locations

$route['admin/location/country/add'] = 'admin/location/country_add';

$route['admin/location/country/edit/(:any)'] = 'admin/location/country_edit/$1';

$route['admin/location/country/del/(:any)'] = 'admin/location/country_del/$1';

$route['admin/location/state/add'] = 'admin/location/state_add';

$route['admin/location/state/edit/(:any)'] = 'admin/location/state_edit/$1';

$route['admin/location/state/del/(:any)'] = 'admin/location/state_del/$1';

$route['admin/location/city/add'] = 'admin/location/city_add';

$route['admin/location/get_city_by_state_id'] = 'admin/location/get_city_by_state_id';

$route['admin/location/city/edit/(:any)'] = 'admin/location/city_edit/$1';

$route['admin/location/city/del/(:any)'] = 'admin/location/city_del/$1';

$route['admin/location/town/add'] = 'admin/location/town_add';

$route['admin/location/town/edit/(:any)'] = 'admin/location/town_edit/$1';

$route['admin/location/town/del/(:any)'] = 'admin/location/town_del/$1';

$route['admin/grievance/grievance_list/(:any)'] = 'admin/grievance/grievance_list/$1';

$route['publish_data'] = 'admin/Permanent_Data/show_public_data/';

$route['publish_data/(:any)'] = 'admin/Permanent_Data/show_public_data/$1';

$route['admin/Users_upload'] = 'admin/Users_upload';

$route['admin/consent_letter/cosent_list_data'] = 'admin/consent_letter/cosent_list_data';

$route['photo/(:any)'] = "viewphoto/view/$1";

$route['authors/(:num)'] = 'authors';

$route['admin/step1'] = 'admin/consent_letter/consent_add';

$route['admin/step2'] = 'admin/consent_letter/consent_add_1';

$route['admin/step3'] = 'admin/consent_letter/consent_add_2';

$route['admin/step4'] = 'admin/consent_letter/consent_add_3';

$route['admin/step5'] = 'admin/consent_letter/consent_add_4';

$route['admin/step6'] = 'admin/consent_letter/consent_add_5';

$route['admin/step7'] = 'admin/consent_letter/consent_add_6';

$route['admin/send_invite'] = 'admin/examshedule_schedule/update_check_box';

// $route['admin/step_1/(:any)'] = "admin/consent_active/consent_add/$1";

// $route['admin/step_2'] = "admin/consent_active/consent_add_1";
$route['send-otp'] = 'admin/Auth/sendOTP';
$route['mail-update'] = 'admin/Auth/mailUpdate';
$route['mobile-update'] = 'admin/Auth/mobileUpdate';
$route['password-update'] = 'admin/Auth/passwordUpdate';
//$route['saveexam-schedule'] = 'admin/Master/saveExamSchedule';