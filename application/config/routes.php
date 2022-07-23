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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// admin
$route['admin'] = 'backend/auth';
//penyakit
$route['penyakit'] = 'backend/penyakit';
$route['add-penyakit'] = 'backend/penyakit/create';
$route['delete-penyakit/(:num)'] = function ($id_penyakit) {
    return 'backend/penyakit/delete' . '/' . $id_penyakit;
};
$route['edit-penyakit/(:num)'] = function ($id_penyakit) {
    return 'backend/penyakit/updatePenyakit' . '/' . $id_penyakit;
};

$route['gejala'] = 'backend/gejala';
$route['add-gejala'] = 'backend/gejala/create';
$route['edit-gejala/(:num)'] = function ($id_gejala) {
    return 'backend/gejala/update' . '/' . $id_gejala;
};

$route['cfpakar'] = 'backend/evidence';
$route['add-cfpakar'] = 'backend/evidence/create';
$route['edit-cf/(:num)'] = function ($evidence_id) {
    return 'backend/evidence/update' . '/' . $evidence_id;
};
$route['delete-cf/(:num)'] = function ($evidence_id) {
    return 'backend/evidence/delete' . '/' . $evidence_id;
};

$route['data-pertanyaan'] = 'backend/pertanyaan';
$route['add-pertanyaan'] = 'backend/pertanyaan/create';

$route['aturan'] = 'backend/aturan';


$route['delete-gejala/(:num)'] = function ($id_gejala) {
    return 'backend/gejala/delete' . '/' . $id_gejala;
};
$route['truncate-gejala'] = 'backend/gejala/clear';
// artikel 
$route['data-artikel'] = 'backend/artikel';
$route['add-artikel'] = 'backend/artikel/create';
$route['view-artikel/(:any)'] = function ($artikel_slug) {
    return 'backend/artikel/read' . '/' . $artikel_slug;
};
$route['edit-artikel/(:any)'] = function ($artikel_slug) {
    return 'backend/artikel/update' . '/' . $artikel_slug;
};
$route['delete-artikel/(:num)'] = function ($artikel_id) {
    return 'backend/artikel/delete' . '/' . $artikel_id;
};
$route['truncate-artikel'] = 'backend/artikel/clear';
//deteksi 
//$route['deteksi-data']= 'frontend/deteksi';

$route['konsultasi'] = 'frontend/konsultasi';
$route['mulai-konsul'] = 'frontend/konsultasi/addKonsultasi';
$route['konfirmasi'] = 'frontend/konsultasi/konfirmasi';
// $route['pertanyaan'] = 'frontend/konsultasi/konsul1';
// $route['pertanyaan2'] = 'frontend/konsultasi/konsul2';
// $route['pertanyaan3'] = 'frontend/konsultasi/konsul3';
$route['execute'] = 'frontend/konsultasi/act';
$route['hasil'] = 'frontend/konsultasi/hasil';

# tester 
$route['pertanyaan/(:num)'] = function ($num) {
    return 'frontend/konsultasi/pertanyaan/' . $num;
};
