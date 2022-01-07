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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['news'] = 'News';
$route['news/(:any)'] = 'News/detail/$1';

$route['artikel'] = 'Artikel';
$route['artikel/(:any)'] = 'Artikel/detail/$1';

$route['event'] = 'Event';
$route['event/(:any)'] = 'Event/detail/$1';

$route['e-library'] = 'Library';
$route['e-library/all'] = 'Library/all';
$route['e-library/read/(:any)'] = 'Library/detail/$1';

$route['program-studi'] = 'Program';
$route['program-studi/proditkp'] = 'Program/proditkp';
$route['program-studi/prodisiio'] = 'Program/prodisiio';

$route['pengaduan'] = 'Welcome/pengaduan';
$route['pengaduan/simpan'] = 'Welcome/simpan';

$route['admin/masuk'] = 'admin/Login';
$route['admin/keluar'] = 'admin/Login/keluar';
$route['admin'] = 'admin/Login';

$route['admin/beranda'] = 'admin/Beranda';

//aduan
$route['admin/aduan'] = 'admin/Aduan';

//pengaturan
$route['admin/pengaturan'] = 'admin/Beranda/pengaturan';
$route['admin/pengaturan/simpan'] = 'admin/Beranda/simpan';

//artikel
$route['admin/artikel'] = 'admin/Artikel';
$route['admin/artikel/tambah'] = 'admin/Artikel/tambah';
$route['admin/artikel/simpan'] = 'admin/Artikel/simpan';
$route['admin/artikel/hapus/(:any)'] = 'admin/Artikel/hapus/$1';
$route['admin/artikel/edit/(:any)'] = 'admin/Artikel/edit/$1';
$route['admin/artikel/up_edit/(:any)'] = 'admin/Artikel/up_edit/$1';

//berita
$route['admin/berita'] = 'admin/Berita';
$route['admin/berita/tambah'] = 'admin/Berita/tambah';
$route['admin/berita/simpan'] = 'admin/Berita/simpan';
$route['admin/berita/hapus/(:any)'] = 'admin/Berita/hapus/$1';
$route['admin/berita/edit/(:any)'] = 'admin/Berita/edit/$1';
$route['admin/berita/up_edit/(:any)'] = 'admin/Berita/up_edit/$1';

//event
$route['admin/event'] = 'admin/Event';
$route['admin/event/tambah'] = 'admin/Event/tambah';
$route['admin/event/simpan'] = 'admin/Event/simpan';
$route['admin/event/hapus/(:any)'] = 'admin/Event/hapus/$1';
$route['admin/event/edit/(:any)'] = 'admin/Event/edit/$1';
$route['admin/event/up_edit/(:any)'] = 'admin/Event/up_edit/$1';

//eve-libraryent
$route['admin/e-library'] = 'admin/Library';
$route['admin/e-library/tambah'] = 'admin/Library/tambah';
$route['admin/e-library/simpan'] = 'admin/Library/simpan';
$route['admin/e-library/hapus/(:any)'] = 'admin/Library/hapus/$1';
$route['admin/e-library/edit/(:any)'] = 'admin/Library/edit/$1';
$route['admin/e-library/up_edit/(:any)'] = 'admin/Library/up_edit/$1';

