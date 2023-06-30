<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Auth';

$route['aksi_login'] = 'Auth/aksi_login';
$route['logout'] = 'Auth/logout';
$route['home'] = 'Dashboard';
// $route['home_admin'] = 'Dashboard';
// $route['home_pegawai'] = 'Dashboard/pegawai';


// Data Barang
$route['view_iphone'] = 'Data_Barang/view_iphone';
$route['view_macbook'] = 'Data_Barang/view_macbook';
$route['entri_barang'] = 'Data_Barang/create';
$route['create_barang'] = 'Data_Barang/action_create';
$route['edit_barang/(:any)'] = 'Data_Barang/update';
$route['update_barang'] = 'Data_Barang/action_update';
$route['delete_barang/(:any)'] = 'Data_Barang/delete';
$route['laporan_barang'] = 'Data_Barang/laporan';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
